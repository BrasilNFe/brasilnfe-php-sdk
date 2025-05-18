<?php

namespace BrasilNFeSdk;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\NameConverter\NameConverterInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;

class CaseInsensitiveNameConverter implements NameConverterInterface
{
    public function normalize(string $propertyName): string
    {
        return $propertyName;
    }

    public function denormalize(string $propertyName): string
    {
        if ($propertyName === strtoupper($propertyName)) {
            return strtolower($propertyName);
        }

        return lcfirst($propertyName);
    }
}

class BrasilNFeRequest
{
    private string $token;
    private string $userToken;
    private string $url;
    private Serializer $serializer;

    public function __construct(string $token, string $url, string $userToken = '')
    {
        $this->token = $token;
        $this->userToken = $userToken;
        $this->url = $url;
        
        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());
        $nameConverter = new CaseInsensitiveNameConverter();
        
        $dateTimeFormat = 'Y-m-d\TH:i:s';
        $dateTimeNormalizer = new DateTimeNormalizer([DateTimeNormalizer::FORMAT_KEY => $dateTimeFormat]);

        $normalizers = [
            $dateTimeNormalizer,
            new ArrayDenormalizer(),
            new ObjectNormalizer(
                $classMetadataFactory,
                $nameConverter,
                null,
                new PhpDocExtractor()
            ),
        ];
        
        $encoders = [new JsonEncoder()];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    public function request(string $metodo, object|array|string $objectSender, string $classReturn, bool $isArray = false, string $responseType = 'json'): object|array|string
    {
        $url = $this->url . $metodo;

        $headers = [
            'Content-Type: application/json',
            'Accept: application/json',
            'Token: ' . $this->token,
            'UserToken: ' . $this->userToken,
            'X-SDK-Version: 1.0.0',
            'X-SDK-Language: PHP'
        ];

        $jsonPayload = $this->serializer->serialize($objectSender, 'json');
        
        //print_r($jsonPayload);

        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $jsonPayload,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_TIMEOUT => 300
        ]);

        $response = curl_exec($ch);

        // $data = json_decode($response, true);
        // print_r($response);

        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new \Exception(date('c') . " - Erro ao efetuar requisição HTTPS com Brasil NFe: $error");
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode < 200 || $httpCode >= 300) {
            throw new \Exception(date('c') . " - Resposta HTTP inválida ($httpCode)");
        }

        if ($responseType === 'base64') {
            return base64_decode($response);
        }
    
        if ($responseType === 'raw') {
            return $response;
        }

        try {
            if ($isArray) {
                return $this->serializer->deserialize($response, $classReturn . '[]', 'json');
            }
            return $this->serializer->deserialize($response, $classReturn, 'json');
        } catch (\Exception $e) {
            throw new \Exception(date('c') . " - Erro ao desserializar resposta: " . $e->getMessage());
        }
    }
}