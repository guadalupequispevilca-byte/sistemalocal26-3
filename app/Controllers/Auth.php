<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        // Si ya está autenticado, redirigir al panel directamente
        if (session()->get('autenticado') === true) {
            return redirect()->to(site_url('dashboard'));
        }

        return view('auth/login');
    }

    public function validar()
    {
        $usuario = (string) $this->request->getPost('usuario');
        $password = (string) $this->request->getPost('password');

        $usuarioCorrecto = 'admin';
        $passwordCorrecto = '123456';

        if (hash_equals($usuarioCorrecto, $usuario) && hash_equals($passwordCorrecto, $password)) {
            // Guardar datos en sesión
            session()->set([
                'autenticado' => true,
                'usuario'     => $usuario,
            ]);

            // Evitamos borrar los datos recién asignados en entorno local
            session()->regenerate(false);

            return redirect()->to(site_url('dashboard'));
        }

        return redirect()
            ->to(site_url('login'))
            ->with('error', 'Usuario o contraseña incorrectos.');
    }

    public function logout()
    {
        // Destruir la sesión por completo
        session()->destroy();

        return redirect()
            ->to(site_url('login'))
            ->with('mensaje', 'Sesión cerrada correctamente.');
    }
}