<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Dns\Dns;

class DnsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show DNS records
     *
     * @param Request $request
     * @return string
     */
    public function show(Request $request)
    {
        request()->validate([
            'url' => 'required'
        ]);

        $domain = $this->getDomain(request('url'));

        try {
            $records = new Dns($domain);
            return $records->getRecords();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Get domain from url
     *
     * @param $url
     * @return bool
     */
    protected function getDomain($url)
    {
        $pieces = parse_url($url);
        $domain = isset($pieces['host']) ? $pieces['host'] : '';
        if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
            return $regs['domain'];
        }
        return false;
    }
}
