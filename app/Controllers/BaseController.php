<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     *public function cek_login()
     *{
     *    $result = true;
     *    if(session()->get('level') != "Admin" && session()->get('status') != "Active"){
     *        $result = false;
     *    }
     *    return $result;
     *}
     */
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['my_helper'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    public function cek_login()
    {

        // $allowedRoles = ['guru', 'tata usaha', 'sarana prasarana', 'siswa'];

        // $result = false;

        // $userRoles = session()->get('role');
        // if (in_array($userRoles, $allowedRoles)) {
        //     $result = true;
        // }
        // return $result;
        
        // $result = true;
        // if (session()->get('role') != 'tata usaha') {
        //     // echo view('emis');
        //     $result = false;
        // }
        // return $result;

        $result = true;
        $role = session()->get('role');
        // $nis = session()->get('nis');

        if ($role != 'tata usaha' && $role != 'guru' && $role != 'sarpras' && $role != 'siswa') {
            $result = false;
        }

        return $result;
        }
}
