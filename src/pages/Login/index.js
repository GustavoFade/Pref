import React from 'react';

import SLogin from './style_login';
import '../../style/global.css';

function Login() {
  return (
    <>
    <SLogin>
      <label>Nome:</label>
      <input type="text"></input>
      
      <label>Senha:</label>
      <input type="password"></input>  

      <a href="#">Entrar</a>
    </SLogin>
    </>
  )
}

export default Login;


