<?php
    
    /*
     *
     * Precisamos retornar um array listando os indicadores com 3 campos variáveis:
     * 1) Instituição ou Nome da capacitação
     * 2) Latitude
     * 3) Longitude
     *
     * No dump temos algumas tabelas:
     * "indicadores" => lista de indicadores, esses indicadores tem campos variáveis
     * "indicadores_secoes_itens" => lista dos campos variáveis dos indicadores
     * "indicadores_respostas" => valores cadastrados referentes aos campos variados dos indicadores
     * "cidades" => Lista de cidades com coordenadas geográficas
     *
     * Resultado deve ser um array como abaixo:
     * array (
     *      ['Capacitação TESTE',	'4.60314',	'-60.1815'],
     *      ['Instituição TESTE',	'-27.5861254',	'-48.5209025']
     * );
     * 
     * Observação: Hoje a tabela "indicadores" tem 40.000 registros  
     * e "indicadores_respostas" 650.000 registros
     * 
     */

     function retorno_maps() {

          mysql_connect("localhost", "mysql_user", "mysql_password") or
               die("Não foi possível conectar: " . mysql_error());
          mysql_select_db("mydb");

          $result = mysql_query("
          select 
          max(case when ir.id_secao_item = 40 then ir.resposta_text 
               else null end) as nome,
          max(case when ir.id_secao_item = 94 then ir.resposta_text 
               else null end) as latitude,
          max(case when ir.id_secao_item = 95 then ir.resposta_text 
               else null end) as logitude
          from indicadores_respostas ir 
          where ir.id_secao_item in (40,94,95)
          group by id_indicador");

          $array = array();

          while ($row = mysql_fetch_array($result)) {
               $array[] = $row[0];
          };

          return  $array;
          }

     print_r( retorno_maps() );