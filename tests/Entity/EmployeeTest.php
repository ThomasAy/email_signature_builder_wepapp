<?php

namespace App\Tests\Entity;

use App\Entity\Employee;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class EmployeeTest extends KernelTestCase
{

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->employee = new Employee();
        self::bootKernel();
        $this->validator = Validation::createValidator();
    }

    public function hasError(int $number = 0)
    {
        $errors = KernelTestCase::getContainer()->get(ValidatorInterface::class)->validate($this->employee);
        $messages = [];
        foreach ($errors as $error) {
            $messages[] = $error->getPropertyPath() . ' => ' . $error->getMessage();
        }
        $this->assertCount($number, $errors, implode(", ", $messages));
    }

    public function testGetId()
    {
        /** @var Employee|MockObject $this- >employee */
        $this->employee = $this->getMockBuilder(Employee::class)
            ->disableOriginalConstructor()
            ->setMethods(['getId'])
            ->getMock();

        $this->employee->method('getId')
            ->willReturn(1);

        $this->assertEquals(1, $this->employee->getId());
    }

    public function testSetPicture()
    {
        $this->employee->setPicture('picture');
        $this->assertEquals('picture', $this->employee->getPicture());
    }

    public function testGetPicture()
    {
        $this->employee->setPicture('picture');
        $this->assertEquals('picture', $this->employee->getPicture());
    }

    public function testPictureIsValid()
    {
        $this->employee->setPicture('https://mili-atlas.fr/wp-content/uploads/picture.jpg');
        $this->hasError();
    }

    public function testPictureIsNotValid()
    {
        $this->employee->setPicture('picture');
        $this->hasError(1);
    }

//
    public function testGetFirstName()
    {
        $this->employee->setFirstName('John');
        $this->assertEquals('John', $this->employee->getFirstName());
    }

    public function testSetFirstName()
    {
        $this->employee->setFirstName('John');
        $this->assertEquals('John', $this->employee->getFirstName());
    }

    public function testGetLastName()
    {
        $this->employee->setLastName('Doe');
        $this->assertEquals('Doe', $this->employee->getLastName());
    }

    public function testSetLastName()
    {
        $this->employee->setLastName('Doe');
        $this->assertEquals('Doe', $this->employee->getLastName());
    }

    public function testSetPhoneNumber()
    {
        $this->employee->setPhoneNumber('06 06 06 06 06');
        $this->assertEquals('06 06 06 06 06', $this->employee->getPhoneNumber());
    }

    public function testGetPhoneNumber()
    {
        $this->employee->setPhoneNumber('06 06 06 06 06');
        $this->assertEquals('06 06 06 06 06', $this->employee->getPhoneNumber());
    }

    public function testPhoneNumberIsTooShort()
    {
        $this->employee->setPhoneNumber('1234567890');
        $this->hasError(2);
    }

    public function testPhoneNumberIsTooLong()
    {
        $this->employee->setPhoneNumber('1234567890123456');
        $this->hasError(2);
    }

    public function testIsPhoneNumberIsValid()
    {
        $this->employee->setPhoneNumber('06 06 06 06 06');
        $this->hasError();
    }

    public function testIsPhoneNumberIsNotValid()
    {
        $this->employee->setPhoneNumber('06 06 06 06');
        $this->hasError(2);
    }

    public function testGetPosition()
    {
        $this->employee->setPosition('Développeur');
        $this->assertEquals('Développeur', $this->employee->getPosition());
    }

    public function testSetPosition()
    {
        $this->employee->setPosition('Développeur');
        $this->assertEquals('Développeur', $this->employee->getPosition());
    }

    public function testSetFirstEmail()
    {
        $this->employee->setFirstEmail('email1');
        $this->assertEquals('email1', $this->employee->getFirstEmail());
    }

    public function testGetFirstEmail()
    {
        $this->employee->setFirstEmail('email1');
        $this->assertEquals('email1', $this->employee->getFirstEmail());
    }

    public function testFirstEmailIsValid()
    {
        $this->employee->setFirstEmail('email3@mili-atlas.fr');
        $this->hasError();
    }

    public function testFirstEmailIsNotValid()
    {
        $this->employee->setFirstEmail('email3@mii-atlas.fr');
        $this->hasError(1);
    }

    public function testGetSecondEmail()
    {
        $this->employee->setSecondEmail('email2');
        $this->assertEquals('email2', $this->employee->getSecondEmail());
    }

    public function testSetSecondEmail()
    {
        $this->employee->setSecondEmail('email2');
        $this->assertEquals('email2', $this->employee->getSecondEmail());
    }

    public function testSecondEmailIsValid()
    {
        $this->employee->setSecondEmail('email3@mili-invest.fr');
        $this->hasError();
    }

    public function testSecondEmailIsNotValid()
    {
        $this->employee->setSecondEmail('email3@miliinvest.fr');
        $this->hasError(1);
    }

    public function testGetThirdEmail()
    {
        $this->employee->setThirdEmail('email3');
        $this->assertEquals('email3', $this->employee->getThirdEmail());
    }

    public function testSetThirdEmail()
    {
        $this->employee->setThirdEmail('email3');
        $this->assertEquals('email3', $this->employee->getThirdEmail());
    }

    public function testThirdEmailIsValid()
    {
        $this->employee->setThirdEmail('email3@1806-patrimoine.fr');
        $this->hasError();
    }

    public function testThirdEmailIsNotValid()
    {
        $this->employee->setThirdEmail('email3@1806patrimoine.fr');
        $this->hasError(1);
    }

    public function testSetInstagramUrl()
    {
        $this->employee->setInstagramUrl('https://www.instagram.com/instagram/');
        $this->assertEquals('https://www.instagram.com/instagram/', $this->employee->getInstagramUrl());
    }

    public function testGetInstagramUrl()
    {
        $this->employee->setInstagramUrl('https://www.instagram.com/instagram/');
        $this->assertEquals('https://www.instagram.com/instagram/', $this->employee->getInstagramUrl());
    }

    public function testInstagramUrlIsValid()
    {
        $this->employee->setInstagramUrl('https://www.instagram.com/instagram/');
        $this->hasError();
    }

    public function testInstagramUrlIsNotValid()
    {
        $this->employee->setInstagramUrl('https://www.instagram.com');
        $this->hasError(1);
    }

    public function testSetTwitterUrl()
    {
        $this->employee->setTwitterUrl('https://www.twitter.com/twitter/');
        $this->assertEquals('https://www.twitter.com/twitter/', $this->employee->getTwitterUrl());
    }

    public function testGetTwitterUrl()
    {
        $this->employee->setTwitterUrl('https://www.twitter.com/twitter/');
        $this->assertEquals('https://www.twitter.com/twitter/', $this->employee->getTwitterUrl());
    }

    public function testTwitterUrlIsValid()
    {
        $this->employee->setTwitterUrl('https://www.twitter.com/twitter/');
        $this->hasError();
    }

    public function testTwitterUrlIsNotValid()
    {
        $this->employee->setTwitterUrl('https://www.twitter.com');
        $this->hasError(1);
    }

    public function testSetLinkedinUrl()
    {
        $this->employee->setLinkedinUrl('https://www.linkedin.com/linkedin/');
        $this->assertEquals('https://www.linkedin.com/linkedin/', $this->employee->getLinkedinUrl());
    }

    public function testGetLinkedinUrl()
    {
        $this->employee->setLinkedinUrl('https://www.linkedin.com/linkedin/');
        $this->assertEquals('https://www.linkedin.com/linkedin/', $this->employee->getLinkedinUrl());
    }

    public function testLinkedinUrlIsValid()
    {
        $this->employee->setLinkedinUrl('https://www.linkedin.com/linkedin/');
        $this->hasError();
    }

    public function testLinkedinUrlIsNotValid()
    {
        $this->employee->setLinkedinUrl('https://www.linkedin.com');
        $this->hasError(1);
    }

    public function testGetFacebookUrl()
    {
        $this->employee->setFacebookUrl('https://www.facebook.com/facebook/');
        $this->assertEquals('https://www.facebook.com/facebook/', $this->employee->getFacebookUrl());
    }

    public function testSetFacebookUrl()
    {
        $this->employee->setFacebookUrl('https://www.facebook.com/facebook/');
        $this->assertEquals('https://www.facebook.com/facebook/', $this->employee->getFacebookUrl());
    }

    public function testFacebookUrlIsValid()
    {
        $this->employee->setFacebookUrl('https://www.facebook.com/facebook/');
        $this->hasError();
    }

    public function testFacebookUrlIsNotValid()
    {
        $this->employee->setFacebookUrl('https://www.facebook.com');
        $this->hasError(1);
    }
}
