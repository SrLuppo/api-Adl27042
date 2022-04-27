# appmax-EG2022CH
## Appmax challenge

### Especificações:
```
PHP: 7.4.27
Laravel: 8.83.5
Laravel Installer: 4.2.10

-- APACHE e MySQL --

Apache/2.4.47 (Unix) OpenSSL/1.1.1k PHP/7.4.19 mod_perl/2.0.11 Perl/v5.32.1
Versão do cliente de banco de dados: libmysql - mysqlnd 7.4.19
```

#### Obs: Renomear o arquivo .env.example

### Comandos iniciais:
```
# Executa a instalação das dependências
composer install

# Para gerar a key da aplicação (.env)
php artisan key:generate

# Executa a criação das migrations
php artisan migrate

# Rollback - migrations (se necessário)
php artisan migrate:rollback
```
### Collection - POSTMAN
```
/postman/Appmax.postman_collection.json
```

### Rotas
<table>
  <tr>
    <th>Tipo</th>
    <th>Rota</th>
    <th>Método</th>
  </tr>
  <tr>
    <td>GET | HEAD</td>
    <td>api/history</td>
    <td>history.index</td>
  </tr>
  <tr>
    <td>GET | HEAD</td>
    <td>api/products</td>
    <td>products.index</td>
  </tr>
  <tr>
    <td>POST</td>
    <td>api/products</td>
    <td>products.store</td>
  </tr>
  <tr>
    <td>GET | HEAD</td>
    <td>api/products/{product}</td>
    <td>products.show</td>
  </tr>
  <tr>
    <td>PUT | PATCH</td>
    <td>api/products/{product}</td>
    <td>products.update</td>
  </tr>
  <tr>
    <td>DELETE</td>
    <td>api/products/{product}</td>
    <td>products.destroy</td>
  </tr>
</table>
