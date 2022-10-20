<?php

class RepresentantesCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(['/site/login']);
    }

    public function abrirCrearRepresentantes(FunctionalTester $I)
    {
        $I->amOnPage(['/pacientes/representantes/create']);
        $I->see('Create Tbl Representantes', 'h1');
    }

    public function enviarFormulario(FunctionalTester $I)
    {
        $I->submitForm('#login-form', [
            'LoginForm[username]' => 'james',
            'LoginForm[password]' => '123456'
        ]);

        $I->amOnPage(['/pacientes/representantes/create']);
        
        $I->submitForm('#form-representante', [
            'TblRepresentantes[nombre]' => 'Karla',
            'TblRepresentantes[apellido]' => 'Yaneth',
            'TblRepresentantes[direccion]'=> 'Col. Palo Blanco',
            'TblRepresentantes[dui]' => '335325-9',
            'TblRepresentantes[telefono]' => '235235',
            'TblRepresentantes[correo_electronico]' => 'karlagranados@gmail.com',
            'TblRepresentantes[id_departamento]' => 12,
            "TblRepresentantes[id_municipio]" => 207,
            "TblRepresentantes[activo]" => 1
        ]);
        $I->dontSeeElement('#form-representante');
        $I->see("Registro creado exitosamente.");
    }
}
