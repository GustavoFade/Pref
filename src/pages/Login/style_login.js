import styled from 'styled-components';

const Div = styled.div`
    background-color: rgba(255, 255, 255, 0.219);
    box-sizing: border-box;
    width: 400px;
    margin-left: auto;
    margin-right: auto;
    transform: translateY(55%);
    padding-top: 80px;
    padding-bottom: 100px;
    display: flex;
    border: 2px solid white;
    border-radius: 10px;
    justify-content: center;
    flex-direction: column ;
    
        label{
            font-size: 1.2em;
            align-self: center ;
        }
        input{
            border-radius: 5px;
            color: black;
            width: 50%;
            align-self: center;
        }
        a{
            background-color: black;
            margin-top: 10px;
            align-self: center;
            text-decoration: none;
            border: 1px solid white;
            border-radius: 5px;
            padding-left: 20px;
            padding-right: 20px;
            transition: 0.3s;
        }
        a:hover{
            background-color: rgba(0, 0, 0, 0.068);
        }
`;

export default Div;