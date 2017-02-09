
<script src="js/jquery.min.1.12.0.js"></script>
<select>
    <option value="black">103</option>
    <option value="white">105</option>
    <option value="yellow">107</option>
    <option value="green">111</option>
    <option value="orange">113</option>
    <option value="blue">115</option>
    <option value="red">104</option>
    <option value="red">106</option>
</select>

<input type="text" id="output">

<script>
	$('select').change(function(){
    $('#output').val($(this).val());
});
</script>