<?php

namespace App\Helpers;

use App\Models\PddiktiToken;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

class CurlPddikti
{
    public static function GetToken()
    {
        $apiPddikti = PddiktiToken::where('id', 1)->get()[0];
        $apiURL = $apiPddikti['url_api'];
        $postInput = [
            'act' => 'GetToken',
            'username' => $apiPddikti['username_api'],
            'password' => $apiPddikti['password_api']
        ];

        $headers = [
            'X-header' => 'value'
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        // $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);
        $token = Arr::get($responseBody, 'data.token');

        return $token;
    }

    public static function GetPeriode()
    {

        $apiPddikti = PddiktiToken::where('id', 1)->get()[0];
        $apiURL = $apiPddikti['url_api'];
        $postInput = [
            "act" => 'GetPeriode',
            "token" => $apiPddikti['the_token'],
            "filter" => "",
            "order" => "",
            "limit" => "",
            "offset" => 0
        ];

        $headers = [
            'X-header' => 'value'
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $responseBody = json_decode($response->getBody(), true);

        // $errorCode = Arr::get($responseBody, 'data.error_code');
        return $responseBody;
    }


    public static function GetKHSMahasiswa($filter)
    {

        $apiPddikti = PddiktiToken::where('id', 1)->get()[0];
        $apiURL = $apiPddikti['url_api'];
        $postInput = [
            "act" => 'GetRekapKHSMahasiswa',
            "token" => $apiPddikti['the_token'],
            "filter" => "id_registrasi_mahasiswa = '" . $filter . "'",
            "order" => "",
            "limit" => "",
            "offset" => 0
        ];

        $headers = [
            'X-header' => 'value'
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $responseBody = json_decode($response->getBody(), true);

        // $errorCode = Arr::get($responseBody, 'data.error_code');
        return $responseBody;
    }

    public static function GetTranskripMahasiswa($filter)
    {

        $apiPddikti = PddiktiToken::where('id', 1)->get()[0];
        $apiURL = $apiPddikti['url_api'];
        $postInput = [
            "act" => 'GetTranskripMahasiswa',
            "token" => $apiPddikti['the_token'],
            "filter" => "id_registrasi_mahasiswa = '" . $filter . "'",
            "order" => "",
            "limit" => "",
            "offset" => 0
        ];

        $headers = [
            'X-header' => 'value'
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $responseBody = json_decode($response->getBody(), true);

        // $errorCode = Arr::get($responseBody, 'data.error_code');
        return $responseBody;
    }

    public static function GetDetailNilaiPerkuliahanKelas($idreg, $namasmt)
    {

        $apiPddikti = PddiktiToken::where('id', 1)->get()[0];
        $apiURL = $apiPddikti['url_api'];
        $postInput = [
            "act" => 'GetDetailNilaiPerkuliahanKelas',
            "token" => $apiPddikti['the_token'],
            "filter" => "id_registrasi_mahasiswa = '" . $idreg . "' and nama_semester = '" . $namasmt . "'",
            "order" => "",
            "limit" => "",
            "offset" => 0
        ];

        $headers = [
            'X-header' => 'value'
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $responseBody = json_decode($response->getBody(), true);

        // $errorCode = Arr::get($responseBody, 'data.error_code');
        return $responseBody;
    }

    public static function GetListMataKuliah($prodi)
    {

        $apiPddikti = PddiktiToken::where('id', 1)->get()[0];
        $apiURL = $apiPddikti['url_api'];
        $postInput = [
            "act" => 'GetListMataKuliah',
            "token" => $apiPddikti['the_token'],
            "filter" => "nama_program_studi = '" . $prodi . "'",
            "order" => "",
            "limit" => "",
            "offset" => 0
        ];

        $headers = [
            'X-header' => 'value'
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $responseBody = json_decode($response->getBody(), true);

        // $errorCode = Arr::get($responseBody, 'data.error_code');
        return $responseBody;
    }

    public static function GetListKurikulum()
    {

        $apiPddikti = PddiktiToken::where('id', 1)->get()[0];
        $apiURL = $apiPddikti['url_api'];
        $postInput = [
            "act" => 'GetListKurikulum',
            "token" => $apiPddikti['the_token'],
            "filter" => "",
            "order" => "",
            "limit" => "",
            "offset" => 0
        ];

        $headers = [
            'X-header' => 'value'
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $responseBody = json_decode($response->getBody(), true);

        // $errorCode = Arr::get($responseBody, 'data.error_code');
        return $responseBody;
    }

    public static function GetMatkulKurikulum($idMatkulKurikulum)
    {

        $apiPddikti = PddiktiToken::where('id', 1)->get()[0];
        $apiURL = $apiPddikti['url_api'];
        $postInput = [
            "act" => 'GetMatkulKurikulum',
            "token" => $apiPddikti['the_token'],
            "filter" => "id_kurikulum ='" . $idMatkulKurikulum . "'",
            "order" => "",
            "limit" => "",
            "offset" => 0
        ];

        $headers = [
            'X-header' => 'value'
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $responseBody = json_decode($response->getBody(), true);

        // $errorCode = Arr::get($responseBody, 'data.error_code');
        return $responseBody;
    }


    public static function GetListMahasiswa($idRegMhs)
    {

        $apiPddikti = PddiktiToken::where('id', 1)->get()[0];
        $apiURL = $apiPddikti['url_api'];
        $postInput = [
            "act" => 'GetListMahasiswa',
            "token" => $apiPddikti['the_token'],
            "filter" => "id_registrasi_mahasiswa = '" . $idRegMhs . "'",
            "order" => "",
            "limit" => "",
            "offset" => 0
        ];

        $headers = [
            'X-header' => 'value'
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $responseBody = json_decode($response->getBody(), true);

        // $errorCode = Arr::get($responseBody, 'data.error_code');
        return $responseBody;
    }
    public static function GetBiodataMahasiswa($idMhs)
    {

        $apiPddikti = PddiktiToken::where('id', 1)->get()[0];
        $apiURL = $apiPddikti['url_api'];
        $postInput = [
            "act" => 'GetBiodataMahasiswa',
            "token" => $apiPddikti['the_token'],
            "filter" => "id_mahasiswa = '" . $idMhs . "'",
            "order" => "",
            "limit" => "",
            "offset" => 0
        ];

        $headers = [
            'X-header' => 'value'
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $responseBody = json_decode($response->getBody(), true);

        // $errorCode = Arr::get($responseBody, 'data.error_code');
        return $responseBody;
    }

    public static function GetListRiwayatPendidikanMahasiswa($idRegMhs)
    {

        $apiPddikti = PddiktiToken::where('id', 1)->get()[0];
        $apiURL = $apiPddikti['url_api'];
        $postInput = [
            "act" => 'GetListRiwayatPendidikanMahasiswa',
            "token" => $apiPddikti['the_token'],
            "filter" => "id_registrasi_mahasiswa = '" . $idRegMhs . "'",
            "order" => "",
            "limit" => "",
            "offset" => 0
        ];

        $headers = [
            'X-header' => 'value'
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $responseBody = json_decode($response->getBody(), true);

        // $errorCode = Arr::get($responseBody, 'data.error_code');
        return $responseBody;
    }
}
