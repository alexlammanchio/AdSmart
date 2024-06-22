const password = document.getElementById('password');
												    	const eye = document.querySelector('.eye');

												    	// 默认为密码输入
												    	password.type = 'password'; 

												    	// 点击显示/隐藏密码
												    	eye.addEventListener('click', () => {

												    	  if(password.type === 'password') {
												    	    password.type = 'text';
												    	    eye.textContent = '🙉';  
												    	  } else {
												    	    password.type = 'password';
												    	    eye.textContent = '🙈';
												    	  }

});
												  

										  