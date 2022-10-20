<?php

use yii\helpers\Url;
use Facebook\WebDriver\WebDriverKeys;

class RepresentantesCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('veterinaria/web', Url::toRoute(['/site/login']));
        $I->wait(1);
    }

    public function enviarFormulario(AcceptanceTester $I)
    {

        $I->amGoingTo("Iniciar sesion");
        $I->fillField('LoginForm[username]', 'james');
        $I->fillField('LoginForm[password]', '123456');
        $I->click('login-button');
        $I->wait(1);
        $I->amGoingTo("Ir a la pagina de crear representante");
        $I->amOnPage('/veterinaria/web/pacientes/representantes/create');
        $I->wait(1);
        $I->amGoingTo('Enviar formulario');
        $I->fillField('TblRepresentantes[nombre]', 'Yaneht');
        $I->wait(1);
        $I->fillField('TblRepresentantes[apellido]', 'Granados');
        $I->wait(1);
        $I->fillField('TblRepresentantes[direccion]', 'Col. Palo blanco');
        $I->wait(1);
        $I->fillField('TblRepresentantes[dui]', '4545545');
        $I->wait(1);
        $I->fillField('TblRepresentantes[telefono]', '3453453');
        $I->wait(1);
        $I->fillField('TblRepresentantes[correo_electronico]', 'karlagranados@gmail.com');
        $I->wait(1);
        $I->executeJS('$("#tblrepresentantes-id_departamento").select2("open")');
        $I->fillField('.select2-search__field', 'SAN MIGUEL');
        $I->wait(1);
        $I->pressKey('.select2-search__field', WebDriverKeys::ENTER);
        $I->wait(1);
        $I->executeJS('$("#tblrepresentantes-id_municipio").select2("open")');
        $I->fillField('.select2-search__field', 'SAN MIGUEL');
        $I->wait(1);
        $I->pressKey('.select2-search__field', WebDriverKeys::ENTER);
        $I->wait(1);
        $I->executeJS('document.getElementById("custom-radio-list-inline-1").checked = true;'); 
        $I->wait(1);
        $I->click("submit-button");
        $I->wait(1);
        $I->see("Registro creado exitosamente.");
        $I->wait(2);
    }
}
