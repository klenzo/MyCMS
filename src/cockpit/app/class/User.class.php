<?php
	/**
	*
	*/
	class User
	{

		protected $validUser = false;

		function __construct()
		{
			# code...
		}


		public function getInfo($val)
		{
			return $this->$val;
		}

	}