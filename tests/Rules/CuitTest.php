<?php

namespace Iutrace\Validation\Tests\Rules;

use Illuminate\Support\Facades\Validator;
use Iutrace\Validation\Rules\Cuit;
use Iutrace\Validation\Tests\TestCase;

class CuitTest extends TestCase
{
    /* @var $cuit Cuit */
    protected $cuit;

    protected function setUp(): void
    {
        parent::setUp();

        $this->cuit = new Cuit();
    }

    public function test_valid_cuit_passes()
    {
        $this->assertTrue($this->cuit->passes('cuit', '20123456786'));
    }

    public function test_valid_cuit_verifier_11_passes()
    {
        $this->assertTrue($this->cuit->passes('cuit', '20010020000'));
    }

    public function test_valid_cuit_verifier_10_passes()
    {
        $this->assertTrue($this->cuit->passes('cuit', '20100020001'));
    }

    public function test_invalid_verifier_cuit_fails()
    {
        $this->assertFalse($this->cuit->passes('cuit', '20123456785'));
    }

    public function test_invalid_type_cuit_fails()
    {
        $this->assertFalse($this->cuit->passes('cuit', '14123456785'));
    }

    public function test_null_cuit_fails()
    {
        $this->assertFalse($this->cuit->passes(null, '20123456785'));
    }

    public function test_empty_cuit_fails()
    {
        $this->assertFalse($this->cuit->passes('', '20123456785'));
    }

    public function test_nullable_field()
    {
        $this->assertTrue(Validator::make(
            [
                'cuit' => null,
            ],
            [
                'cuit' => ['nullable', new Cuit()],
            ]
        )->passes());

        $this->assertTrue(Validator::make(
            [
                'cuit' => null,
            ],
            [
                'cuit' => [new Cuit()],
            ]
        )->fails());
    }

    public function test_empty_field()
    {
        $this->assertTrue(Validator::make(
            [
                'cuit' => '',
            ],
            [
                'cuit' => ['nullable', new Cuit()],
            ]
        )->passes());

        $this->assertTrue(Validator::make(
            [
                'cuit' => '',
            ],
            [
                'cuit' => [new Cuit()],
            ]
        )->passes());
    }

    public function test_required_field()
    {
        $this->assertTrue(Validator::make(
            [
                'cuit' => null,
            ],
            [
                'cuit' => ['required', new Cuit()],
            ]
        )->fails());

        $this->assertTrue(Validator::make(
            [
                'cuit' => '',
            ],
            [
                'cuit' => ['required', new Cuit()],
            ]
        )->fails());

        $this->assertTrue(Validator::make(
            [
                'cuit' => '20123456786',
            ],
            [
                'cuit' => ['required', new Cuit()],
            ]
        )->passes());
    }
}
