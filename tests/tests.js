
var txtFile = new XMLHttpRequest();
txtFile.open("GET", "_data/clean_brand.json", false);

txtFile.onreadystatechange = function() {
	
	var testCase = eval("("+txtFile.responseText +")");
	/*
	allText = txtFile.responseText;
    allTextLines = allText.split(/\r\n|\n/);
	*/
    QUnit.test( "cleanBrand", function(assert) {

	    for (key in testCase) {
			
			var line = testCase[key];

			var res = CodeBrandCleaner.cleanBrand(line[0]);
			assert.equal(res, line[1]);

		}
	});
    
};
txtFile.send(null);

var txtFile = new XMLHttpRequest();
txtFile.open("GET", "_data/clean_code.json", false);

txtFile.onreadystatechange = function() {
	
	var testCase = eval("("+txtFile.responseText +")");
	/*
	allText = txtFile.responseText;
    allTextLines = allText.split(/\r\n|\n/);
	*/
    QUnit.test( "cleanCode", function(assert) {

	    for (key in testCase) {
			
			var line = testCase[key];

			var res = CodeBrandCleaner.cleanCode(line[0]);
			assert.equal(res, line[1]);

		}
	});
    
};
txtFile.send(null);