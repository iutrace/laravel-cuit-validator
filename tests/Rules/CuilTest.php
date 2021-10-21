<?php

namespace Iutrace\Validation\Tests\Rules;

use Illuminate\Support\Facades\Validator;
use Iutrace\Validation\Rules\Cuil;
use Iutrace\Validation\Rules\Cuit;
use Iutrace\Validation\Tests\TestCase;

class CuilTest extends TestCase
{
    /* @var $cuil Cuil */
    protected $cuil;

    protected function setUp(): void
    {
        parent::setUp();

        $this->cuil = new Cuil();
    }

    public function test_valid_cuil_passes()
    {
        $this->assertTrue($this->cuil->passes('cuil', '20123456786'));
    }

    public function test_valid_cuit_fails()
    {
        $this->assertTrue((new Cuit())->passes('cuit', '30123456781'));
        $this->assertFalse($this->cuil->passes('cuil', '30123456781'));
    }

    public function test_fail_message()
    {
        $this->assertTrue(Validator::make(
            [
                'cuil' => '20123456785',
            ],
            [
                'cuil' => 'nullable|cuil',
            ]
        )->fails());

        $this->assertTrue(Validator::make(
            [
                'cuil' => '20123456785',
            ],
            [
                'cuil' => ['nullable', new Cuil()],
            ]
        )->fails());
    }
}
