function checkboxTable()
{
var checkBox = document.getElementById("check_t1");
if (checkBox.checked == true){
document.getElementById("space_size0").style.display = '';

document.getElementById("table_p1").style.display = '';
document.getElementById("table_p5").style.display = '';
document.getElementById("label1").style.display = '';
document.getElementById("label2").style.display = '';
document.getElementById("label3").style.display = '';
document.getElementById("label4").style.display = '';
document.getElementById("label5").style.display = '';
document.getElementById("label6").style.display = '';
document.getElementById("table_p2").style.display = '';
document.getElementById("table_p3").style.display = '';
document.getElementById("table_p4").style.display = '';

}
else {
	document.getElementById("table_p5").style.display = 'none';
document.getElementById("space_size0").style.display = 'none';
document.getElementById("table_p1").style.display = 'none';
document.getElementById("label1").style.display = 'none';
document.getElementById("label2").style.display = 'none';
document.getElementById("label3").style.display = 'none';
document.getElementById("label4").style.display = 'none';
document.getElementById("label5").style.display = 'none';
document.getElementById("label6").style.display = 'none';
document.getElementById("table_p2").style.display = 'none';
document.getElementById("table_p3").style.display = 'none';
document.getElementById("table_p4").style.display = 'none';

}
}




