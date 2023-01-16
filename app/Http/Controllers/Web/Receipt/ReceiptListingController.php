<?php

namespace App\Http\Controllers\Web\Receipt;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ReceiptListingController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function __invoke(): View|Factory|Application
    {
        return view('receipt.receipts');
    }
}
