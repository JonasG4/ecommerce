<?php

class FuncionalCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(['/pacientes/representantes/create']);
    }

    //? tests
    public function openCrearRepresentantePagina(FunctionalTester $I)
    {  
        $I->see('Create Tbl Representantes', 'h1');
    } 
}