WaveForm PHP Input validation
=============================

WaveForm is a form validation class for PHP.
It can provide for form (or table or just field) HTML generation as well as validation rules.

WaveForm also provides bindings for CodeIgniter.

Examples
========

Simple inline usage
-------------------

The below example loads up WaveForm, defines some fields then sits out a form for the user to enter data into.
Finally the form is validated and (should everything be ok) the values passed on for further processing.

	<?php
	require('waveform.php');
	$Waveform = new Waveform();
	$Waveform->Group('Personal Details');
	$Waveform->Define('name');
	$Waveform->Define('email')
		->Email();
	$Waveform->Define('age')
		->Type('int')
		->Min(18);
	$Waveform->Group('Optional Info');
	$Waveform->Define('sex')
		->Choice(array('m' => 'Male', 'f' => 'Female'));
	$Waveform->Define('music_tastes')
		->Type('text');
	$Waveform->Define('avatar')
		->File('temp')
		->Max('200kb');

	if ($Waveform->OK()) { // Everything is ok?
		// Everything went ok. $this->Waveform->Fields is now an array
		// full of the values the user provided.
		echo "<h1>Thanks for signing up {$this->Waveform->Fields['name']}</h1>";
		echo "<p>Posted values: <pre>" . print_r($_POST, 1) . "</pre></p>";
	} else { // New page OR Something failed
		// Something went wrong OR this is the first time we've viewed the page.
		// Display the form (with errors if any):
		echo "<h1>Signup</h1>";
		echo $Waveform->Form();
	}
	?>

Use with CodeIgniter
--------------------

The 'CodeIgniter' folder in this project should be copied to your 'application' folder. Now copy the main Waveform.php file into your application/libraries folder.

The below shows a simple car editing contoller written for [CodeIgniter](http://codeigniter.com/).

	<?php
	/**
	* CodeIgniter Car controller
	* Provides a CRUD interface for managing a users cars
	*/
	function Cars() {
		/**
		* Display a list of cars
		*/
		function Index() {
			// Add some listing code here
		}

		/**
		* Edit a car by its ID
		* @param int $carid The Unique ID of the car to edit
		*/
		function Edit($carid = null) {
			$car = $this->Car->GetById($carid);
			$this->load->library('Waveform');

			$this->Waveform->Define('make')
				->Text();
				->Min(1);
				->Max(100);
			$this->Waveform->Define('model')
				->Choice(array(
					'Ford',
					'Chevy',
					'Holden',
					'GM',
				);
			$this->Waveform->Define('reg')
				->Title('Registration')
				->NotRequired();

			if ($this->Waveform->OK()) {
				$this->Car->Save($this->Waveform->Fields);
				header('Location: /cars');
				exit;
			} else {
				$this->load->view('waveform');
			}
		}
	}
	?>

Further examples can be found in [examples](https://github.com/hash-bang/WaveForm/tree/master/docs/examples) directory.
