<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#2192     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Mainlibrary
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function InitSettings($id)
    {
        $query = $this->ci->db->get_where('settings', array('id' => $id))->row();
        if ($query) return $query;
    }

    public function ParseTanggalLahir($tanggal_lahir)
    {
        $explode = explode('-', $tanggal_lahir);
        $tanggal = $explode[0];
        $bulan = $this->GetMonths($explode[1]);
        $tahun = $explode[2];

        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }

    public function GetBulanGaji($defaultDate)
    {
        $resultdate = array();

        // Get Years (2 Digits)
        $explode1 = explode('-', $defaultDate)[0];
        $split1 = str_split($explode1, 2);

        // Get Month (2 Digits)
        $explode2 = explode('-', $defaultDate)[1];

        // Get Days (2 Digits)
        $explode3 = explode('-', $defaultDate)[2];
        $split2 = str_split($explode3, 2);

        // Get Hours (2 Digits)
        $explode4 = explode('T', $defaultDate)[1];
        $explode5 = explode(':', $explode4);

        // Get Minutes (2 Digits)
        $explode6 = $explode5[1];

        // The Result
        $resultdate['month'] = $explode2;

        return $resultdate;
    }

    public function ParseTanggal($defaultDate)
    {
        $resultdate = array();

        // Get Years (2 Digits)
        $explode1 = explode('-', $defaultDate)[0];
        $split1 = str_split($explode1, 2);

        // Get Month (2 Digits)
        $explode2 = explode('-', $defaultDate)[1];

        // Get Days (2 Digits)
        $explode3 = explode('-', $defaultDate)[2];
        $split2 = str_split($explode3, 2);

        // Get Hours (2 Digits)
        $explode4 = explode('T', $defaultDate)[1];
        $explode5 = explode(':', $explode4);

        // Get Minutes (2 Digits)
        $explode6 = $explode5[1];

        // The Result
        $resultdate['years'] = $split1[1];
        $resultdate['month'] = $explode2;
        $resultdate['days'] = $split2[0];
        $resultdate['hours'] = $explode5[0];
        $resultdate['minutes'] = $explode6;

        return $resultdate;
    }

    public function ParseTanggalGaji($tanggal_lahir)
    {
        $explode = explode('-', $tanggal_lahir);
        $tanggal = $explode[0];
        $bulan = $this->GetMonths($explode[1]);
        $tahun = $explode[2];

        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }

    public function ParseNomorHp($no_hp)
    {
        $split = explode('+62', $no_hp);
        return $split[1];
    }

    public function GetMonths($months_id)
    {
        $monthsData = array(
            0  => 'Undefined',
            1  => 'Januari',
            2  => 'Februari',
            3  => 'Maret',
            4  => 'April',
            5  => 'Mei',
            6  => 'Juni',
            7  => 'Juli',
            8  => 'Agustus',
            9  => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        );

        switch ($months_id)
        {
            case 1:
                {
                    return $monthsData[1];
                }
            case 2:
                {
                    return $monthsData[2];
                }
            case 3:
                {
                    return $monthsData[3];
                }
            case 4:
                {
                    return $monthsData[4];
                }
            case 5:
                {
                    return $monthsData[5];
                }
            case 6:
                {
                    return $monthsData[6];
                }
            case 7:
                {
                    return $monthsData[7];
                }
            case 8:
                {
                    return $monthsData[8];
                }
            case 9:
                {
                    return $monthsData[9];
                }
            case 10:
                {
                    return $monthsData[10];
                }
            case 11:
                {
                    return $monthsData[11];
                }
            case 12:
                {
                    return $monthsData[12];
                }
            
            default:
                # code...
                break;
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>