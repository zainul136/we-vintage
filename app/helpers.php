<?php
// app/helpers.php
require_once 'helpers.php';

use App\Mail\StockAlertEmail;
use App\Models\Supplier;
use Illuminate\Support\Facades\Mail;

if (!function_exists('sendEmail')) {
    function sendEmail($partName, $status, $supplier)
    {
        $recipients = [
            'thomas@aspesite.com',
            'sofia.loa@aspesite.com',
            'uriel.calderon@aspesite.com',
            ' diego@aspesite.com'
        ];

        if ($status === 'red') {
            $subject = 'Red Alert: ' . $partName . ' is below the reorder point';
            $message = $partName . ' is below the reorder point. Contact ' . getSupplierName($supplier) . ' to reorder the part.';
        } elseif ($status === 'yellow') {
            $subject = 'Yellow Alert: ' . $partName . ' is getting close to the reorder point';
            $message = $partName . ' is getting close to the reorder point. Contact ' . getSupplierName($supplier) . ' to reorder the part.';
        } else {
            // Handle any other status or return a redirect if needed
        }



        foreach ($recipients as $recipient) {
            Mail::to($recipient)->send(new StockAlertEmail($subject, $message, $supplier));
        }
    }
}
if (!function_exists('getSupplierName')) {
    function getSupplierName($id)
    {
        $name = '';
        if ($id) {
            $supplier = Supplier::find($id);
            $name =  $supplier->name ?? '';
        }
        return $name;
    }
}
