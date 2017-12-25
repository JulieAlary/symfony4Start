<?php

namespace App\Entity\Core;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\Core\UserRepository")
 * @UniqueEntity(fields="email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

	/**
	 * @ORM\Column(type="string", length=25, unique=true)
	 * @Assert\NotBlank()
	 */
	private $username;

	/**
	 * @ORM\Column(type="string", length=25)
	 * @Assert\NotBlank()
	 */
	private $lastname;

	/**
	 * @return mixed
	 */
	public function getLastname() {
		return $this->lastname;
	}

	/**
	 * @param mixed $lastname
	 */
	public function setLastname( $lastname ): void {
		$this->lastname = $lastname;
	}

	/**
	 * @return mixed
	 */
	public function getFirstname() {
		return $this->firstname;
	}

	/**
	 * @param mixed $firstname
	 */
	public function setFirstname( $firstname ): void {
		$this->firstname = $firstname;
	}

	/**
	 * @ORM\Column(type="string", length=25)
	 * @Assert\NotBlank()
	 */
	private $firstname;

	/**
	 * @Assert\NotBlank()
	 * @Assert\Length(max=4096)
	 */
	private $plainPassword;

	/**
	 * @ORM\Column(type="string", length=64)
	 */
	private $password;

	/**
	 * @ORM\Column(type="string", length=60, unique=true)
	 */
	private $email;

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	public function getPlainPassword()
	{
		return $this->plainPassword;
	}

	public function setPlainPassword($password)
	{
		$this->plainPassword = $password;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	/**
	 * @param mixed $id
	 */
	public function setId( $id ): void {
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail( $email ): void {
		$this->email = $email;
	}

	/**
	 * @return mixed
	 */
	public function getisActive() {
		return $this->isActive;
	}

	/**
	 * @param mixed $isActive
	 */
	public function setIsActive( $isActive ): void {
		$this->isActive = $isActive;
	}

	/**
	 * @ORM\Column(name="is_active", type="boolean")
	 */
	private $isActive;

	public function __construct()
	{
		$this->isActive = true;
		// may not be needed, see section on salt below
		// $this->salt = md5(uniqid('', true));
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function getSalt()
	{
		// you *may* need a real salt depending on your encoder
		// see section on salt below
		return null;
	}

	public function getRoles()
	{
		return array('ROLE_USER');
	}

	public function eraseCredentials()
	{
	}

	/** @see \Serializable::serialize() */
	public function serialize()
	{
		return serialize(array(
			$this->id,
			$this->username,
			$this->password,
			// see section on salt below
			// $this->salt,
		));
	}

	/** @see \Serializable::unserialize() */
	public function unserialize($serialized)
	{
		list (
			$this->id,
			$this->username,
			$this->password,
			// see section on salt below
			// $this->salt
			) = unserialize($serialized);
	}
}
