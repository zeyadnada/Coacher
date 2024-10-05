<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class CannotDeleteRecordException extends Exception
{
    public function render(Request $request)
    {
        return redirect()->back()->with('error', $this->getMessage());
    }
}
