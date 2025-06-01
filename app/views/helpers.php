<?php

function classStatusPengaduan($status)
{
    if ($status == "Accepted") {
        echo "bg-green-500 text-white hover:bg-green-600";
    } else if ($status == "Pending") {
        echo "bg-[#F4A024] text-white hover:bg-[#D5830B]";
    } else {
        echo "bg-[#FF0000] text-white hover:bg-[#C70000]";
    }
}

function classStatusUser($role)
{
    if ($role == "Siswa") {
        echo "bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm font-medium";
    } else if ($role == "Guru") {
        echo "bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm font-medium";
    }
}