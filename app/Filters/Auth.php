<?php namespace App\Filters;
 
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
 
class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // // if user not logged in
        // $auth = service('auth');
        // if(! $auth->isLoggedIn()){
        //     // then redirct to login page
        //     return redirect()->to('Auth/login'); 
        // }
        if(!session('user_id')){
            return redirect()->to(site_url('Auth/login'))->with('error', 'Harap Login Terlebih Dahulu');
        }
    }
 
    //--------------------------------------------------------------------
 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}