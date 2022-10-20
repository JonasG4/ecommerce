<?php

use app\models\TblRepresentantes;

class RepresentantesTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testCrearRepresentante()
    {
        $r = new TblRepresentantes();
        $r->cod_representante = "RP-0010";
        $r->nombre = "Karla";
        $r->apellido = "Zelaya";
        $r->direccion = "Col. Palo blanco";
        $r->id_departamento = 12;
        $r->id_municipio = 207;
        $r->dui = "343434";
        $r->telefono = "45345345";
        $r->correo_electronico = "karlagrandos@gmail.com";
        $r->fecha_ing = date('Y-m-d H:i:s');
        $r->fecha_mod = date('Y-m-d H:i:s');
        $r->user_ing = 1;
        $r->user_mod = 1;
        $r->activo = 1;
        $this->assertTrue($r->save());
    }

    public function testValidacionCampos()
    {
        $r = new TblRepresentantes();

        //Validar que el nombre no sea nulo
        $r->nombre = null;
        $this->assertFalse($r->validate(['nombre']));

        $r->apellido = null;
        $this->assertFalse($r->validate(['apellido']));

        $r->direccion = null;
        $this->assertFalse($r->validate(['direccion']));

        $r->id_departamento = null;
        $this->assertFalse($r->validate(['id_departamento']));

        $r->id_municipio = null;
        $this->assertFalse($r->validate(['id_municipio']));

        $r->dui = null;
        $this->assertFalse($r->validate(['dui']));

        $r->telefono = null;
        $this->assertFalse($r->validate(['telefono']));

        $r->correo_electronico = null;
        $this->assertFalse($r->validate(['correo_electronico']));
    }
}
