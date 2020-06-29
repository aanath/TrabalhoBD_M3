<html>
    <head>
        <meta charset="UTF-8">
        <title>Transporte</title>
    </head>
    <body>
        <h1>Adicionar Cliente</h1>
        <small>*Campos obrigatórios</small>
        <form action="AdicionarController.php" method="post">
                
            <br/>
            Nome*:
            <input type='text' name='nome' id='nome' required="true"/>
            <br/>
            <br/>
            E-mail*:
            <input type='text' name='email' id='email' required="true"/>
            <br/>
            <br/>
            Telefone*:
            <input type='text' name='telefone' id='telefone' required="true"/>
            <br/>
            <br/>
            Logradouro*:
            <input type='text' name='logradouro' id='logradouro' required="true"/>
            <br/>
            <br/>
            Numero*:
            <input type='text' name='numero' id='numero' required="true"/>
            <br/>
            <br/>
            Bairro*:
            <input type='text' name='bairro' id='bairro' required="true"/>
            <br/>
            <br/>
            Cidade*:
            <input type='text' name='cidade' id='cidade' required="true"/>
            <br/>
            <br/>
            Estado*:
            <input type='text' name='estado' id='estado' required="true"/>
            <br/>
            <br/>
            
            <button type="submit">Registrar</button>
            <button type="button" onclick="location.href= '/index.php'">Voltar</button>
        </form>
    </body>
</html>

