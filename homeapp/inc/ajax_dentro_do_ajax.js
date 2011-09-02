function extraiScript(texto){
//Maravilhosa função feita pelo SkyWalker.TO do imasters/forum
//http://forum.imasters.com.br/index.php?showtopic=165277
        // inicializa o inicio ><
        var ini = 0;
        // loop enquanto achar um script
        while (ini!=-1){
                // procura uma tag de script
                ini = texto.indexOf('<script', ini);
                // se encontrar
                if (ini >=0){
                        // define o inicio para depois do fechamento dessa tag
                        ini = texto.indexOf('>', ini) + 1;
                        // procura o final do script
                        var fim = texto.indexOf('</script>', ini);
                        // extrai apenas o script
                        codigo = texto.substring(ini,fim);
                        // executa o script
                        //eval(codigo);
                        /**********************
                        * Alterado por Micox - micoxjcg@yahoo.com.br
                        * Alterei pois com o eval não executava funções.
                        ***********************/
                        novo = document.createElement("script")
                        novo.text = codigo;
                        document.body.appendChild(novo);
                }
        }
}