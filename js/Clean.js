
var CodeBrandCleaner = {

	'cleanCode': function(str) {

		if (typeof str == 'array' || typeof str == 'object') {
			return '';
		}

		return str.toString().replace(/[^A-Z0-9]/gi, '', str).toUpperCase();
		
	},

	'cleanBrand': function(str) {

		if (typeof str == 'array' || typeof str == 'object') {
			return '';
		}

		str = str.toString().toUpperCase(str);
		str = str.replace(/[\/\+\-\_\(\)\\\&]/g, ' ', str);
		str = str.replace(/[ö]/ig, 'O', str);

		str = str.replace(/[^A-Z0-9\s]/g, '', str);
		str = str.replace(/\s+/g, ' ', str);

		return str.trim();

	}
};
