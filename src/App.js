import Login from './style/Login'
import './style/global.css';

function App() {
  return (
    <>
    <Login>
      <label>Nome:</label>
      <input type="text"></input>
      
      <label>Senha:</label>
      <input type="password"></input>  

      <a href="#">Entrar</a>
    </Login>
    </>
  )
}

export default App;
