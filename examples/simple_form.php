<?
// Define the Waveform fields
require('../waveform.php');
$Waveform = new Waveform();
$Waveform->Define('name');
$Waveform->Define('city')
	->NotRequired();
$Waveform->Define('age')
	->Type('int')
	->Min(18);
$Waveform->Define('sex')
	->Choice(array('m' => 'Male', 'f' => 'Female'));
?>

<? if ($Waveform->OK()) { // Everything is ok? ?>
	<h1>Welcome back <?=$_POST['name']?></h1>
	<p>From <?=$_POST['city']?>, aged <?=$_POST['age']?></p>
<? } else { // New page OR Something failed ?>
	<h1>Welcome</h1>
	<?=$Waveform->Form()?>
<? } ?>
