function validateForm() 
{
    if (document.forms["myForm"]["brand"].value == "") 
    {
        alert("Brand Name cannot be Empty.");
        return false;
    }
	if (document.forms["myForm"]["model"].value == "") 
    {
        alert("Model cannot be Empty.");
        return false;
    }
	if (document.forms["myForm"]["variant"].value == "") 
    {
        alert("Variant cannot be Empty.");
        return false;
    }
	if (document.forms["myForm"]["year"].value == "") 
    {
        alert("Make Year cannot be Empty.");
        return false;
    }
	if (document.forms["myForm"]["year"].value.length != 4)
    {
        alert("Year must be of 4 digits.");
        return false;
    }
	if (!/^[0-9]*$/g.test(document.myForm.year.value)) {
        alert("Invalid characters. Year of Manufacture can contain only Digits[0-9].");
        return false;
    }
	if (document.forms["myForm"]["rent"].value == "") 
    {
        alert("Rent cannot be Empty.");
        return false;
    }
	if (!/^[0-9]*$/g.test(document.myForm.rent.value)) {
        alert("Invalid characters. Rent can contain only Digits[0-9].");
        return false;
    }
	return true;
}