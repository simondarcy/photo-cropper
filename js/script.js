var serviceRoot = "http://simondarcyonline.com/mygame/";
var data = {
            uid:123,
            img:null
        };
var el = document.getElementById('vanilla-demo');
var vanilla = new Croppie(el, {
    viewport: { width: 100, height: 100, type:'circle' },
    boundary: { width: 300, height: 300 },
    showZoomer: true,
    enableExif: true,
    enableOrientation: false
});
vanilla.bind({
    url: 'demo/demo-3.jpg'
});


function readURL(input) {


  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      vanilla.bind({
	    url: e.target.result
	  });
    }

    reader.onloadend = function() {
     base64data = reader.result;                
     console.log(base64data);
 	}


    reader.readAsDataURL(input.files[0]);

	

  }
}

function popupResult(result) {
	//console.log(result);
		var html;
		if (result.html) {
			html = result.html;
		}
		if (result.src) {
			//html = '<img src="' + result.src + '" />';
			document.getElementById('myImg').setAttribute('src', result.src);
		}
		
	}

document.getElementById('upload').addEventListener('change', function () { 
	
	document.getElementById('upload').style.display = 'none';
	document.getElementById('vanilla-demo').style.display = 'block';
	document.querySelector('.vanilla-result').style.display = 'block';
	document.querySelector('.file-upload-wrapper').style.display = 'none';
	readURL(this)
});

function publish(){
		
		var xhr = new XMLHttpRequest();
		xhr.open("POST", serviceRoot + "service.php", true);
		xhr.setRequestHeader('Content-Type', 'application/json');
		xhr.send(JSON.stringify(
		    data
		));

		xhr.onreadystatechange = function() {
		    if (xhr.readyState == XMLHttpRequest.DONE) {
		    	resp = JSON.parse(xhr.responseText)
		        link = 'http://simondarcyonline.com/xmas/?id=' + resp.id;
		        linkEl = document.getElementById('link');
		        linkEl.style.display = 'block';
		        linkEl.setAttribute('href', link);
		    }
		}

		document.getElementById('publish').style.display = 'none';

}


document.querySelector('.vanilla-result').addEventListener('click', function (ev) {				
	vanilla.result({
		type: 'base64'
	}).then(function (base) {
		
		data.img = base;
	});


	vanilla.result({
		type: 'blob'
	}).then(function (blob) {
		popupResult({
			src: window.URL.createObjectURL(blob)
		});
	});


	document.getElementById('vanilla-demo').style.display = 'none';
	document.querySelector('.vanilla-result').style.display = 'none';
	document.getElementById('publish').style.display = 'block';
});