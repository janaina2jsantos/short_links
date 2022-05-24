<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Como rodar o projeto

- Crie o banco e faça a conexão.
- Rode as migrations.
- Rode as seeds.
- Use o usuário admin criado pela seed para fazer login e navegar pelo sistema.
- O usuário admim pode criar novos clientes.
- Ao criar novos clientes a senha padrão do cliente é 123456.
- As rotas que somente o usuário admin pode acessar são protegidas por middleware, evitando que o cliente acesse.
- Somente o cliente pode criar e editar links.
- O usuário admin pode ver a listagem de links, mas não pode criar nem editar.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
