<?php

namespace Tests\Unit;

use App\Mail\NewCompanyNotification;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Mockery\MockInterface;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;


    public function testNewCompanyNotificationEmailSent()
    {
        Mail::fake();
        $company = Company::factory()->create();
        $this->post(route('companies.store'), $company->toArray());
        Mail::to($company->email)->send(new NewCompanyNotification($company));
        Mail::assertSent(NewCompanyNotification::class);
    }

}
