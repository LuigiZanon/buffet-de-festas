<p align="center"><a href="https://github.com/LuigiZanon/buffet-de-festas" target="_blank"><img src="https://cdn.discordapp.com/attachments/1138806499611779146/1165802486444068885/4fun.png?ex=655aa22c&is=65482d2c&hm=a972c7dd0f454e72ae9bf5b8825f7047907da036851ad25c56835f13b748c299&" width="400" alt="Laravel Logo"></a></p>

# 4Fun Buffet de Festas
## Um website de agendamento e gerenciamento de festas

Link para figma: 
- https://www.figma.com/file/4OjfPZZsBWbsdLAR9M1vFe/Buffet-4fun?type=design&node-id=0%3A1&mode=design&t=3AIX4jWaRFD79JyR-1

## Dependências
| Plugin | README |
| ------ | ------ |
| Docker| https://docs.docker.com/get-docker/ |
| Composer | https://getcomposer.org/download/ |
| Node | https://nodejs.org/en/download |
| Git | https://git-scm.com/downloads |
| WSL | https://learn.microsoft.com/pt-br/windows/wsl/install |
| Visual Studio (ou outro IDE) |https://code.visualstudio.com/#alt-downloads|
## Instalação
- Abra o git bash no local onde deseja instalar os arquivos

#### Realize um clone do repositório
```sh
git clone https://github.com/LuigiZanon/buffet-de-festas.git
cd buffet-de-festas/
code .
```

- Abra a pasta 'buffet-de-festas' em um IDE de sua preferência e execute os seguintes comandos:
```sh
composer update
```
```sh
wsl
./vendor/bin/sail up --build
```
Em um novo terminal, dê o seguinte comando:
```sh
npm install
npm run dev
```
Agora, dentro do terminal laravel.test-1, dê o migrate.
```sh
php artisan migrate:fresh --seed
```
O site deverá estar rodando em:
```sh
localhost/
```
O sistema possui 4 niveis de acesso:
- Comercial
- Operacional
- Administrativo
- Aniversariante

para que tudodê certo, siga estes passos:
- logue com:
```sh
admin@admin.com
'password'
```

- ir em 'Agendar', 'Horario de funcionamento' e definir um horario e tempo de festa
- ir em 'Agendar', 'Editar recomendações' e definir as recomendações do buffet
- Ir em 'Pacotes', 'Criar pacote' e crie pelo menos um pacote



---/---



- Agora você ja pode registrar festas com um usuário de permissão aniversariante
- Parabéns por setar o website!
