# DOW-docker 🐳

**Disciplina:** Desenvolvimento e Operações na Web  
**Trabalho 1:** Aplicação Web Conteinerizada  

Este repositório contém o projeto prático focado na conteinerização de uma aplicação web CRUD utilizando a stack LEMP (Linux, Nginx, MySQL e PHP). O ambiente foi projetado com foco em segurança e performance, rodando inteiramente em contêineres Docker isolados e utilizando certificados SSL/TLS gerados por uma Autoridade Certificadora (CA) local.

---

## 🏢 A Empresa Fictícia (REQ01 e REQ02)
* **Nome:** Luiz LTDA
* **Domínio Local:** `luiz-ltda.local`
* **Aplicação:** Sistema de gerenciamento interno (CRUD) de clientes/usuários da empresa.

---

## 💾 Modelagem do Banco de Dados (REQ03 e REQ04)
O sistema foi desenvolvido utilizando uma única tabela central no banco de dados `mydb`, atendendo aos requisitos do escopo do projeto.

**Tabela: `usuarios`**

| Coluna | Tipo | Restrições | Descrição |
| :--- | :--- | :--- | :--- |
| `id` | INT | PRIMARY KEY, AUTO_INCREMENT | Identificador único do usuário. |
| `nome` | VARCHAR(100) | NOT NULL | Nome completo do usuário. |
| `endereco` | VARCHAR(255) | | Endereço residencial/comercial. |
| `telefone` | VARCHAR(20) | | Telefone de contato. |
| `data_nasc`| DATE | | Data de nascimento (Formato AAAA-MM-DD). |

**Script SQL de Criação:**
```sql```  
CREATE TABLE users (  
     &nbsp;&nbsp; id INT AUTO_INCREMENT PRIMARY KEY,  
     &nbsp;&nbsp;nome VARCHAR(100) NOT NULL,  
     &nbsp;&nbsp;endereco VARCHAR(255),  
     &nbsp;&nbsp;telefone VARCHAR(20),  
     &nbsp;&nbsp;data_nasc DATE  
);

---

## 📋 Anexo: Instruções Originais do Trabalho
<details>
<summary><b>Clique aqui para expandir e ler os requisitos completos exigidos pelo professor</b></summary>

### Trabalho 1 (único) - Aplicação Web Conteinerizada
**Bora conteinerizar!**
O objetivo deste trabalho é que você mostre o que sabe sobre conteinerização de aplicações web. Para isso, você vai personalizar e conteinerizar uma aplicação web CRUD para uma empresa que você vai inventar.
No final, você vai gravar um vídeo explicando sobre o processo e mostrando sua aplicação funcionando em contêineres. Fique de olho nos requisitos (REQ) e nos critérios (CRIT) de avaliação que devem ser seguidos!

**Passo I: Crie sua Aplicação Web CRUD**
* **REQ01 - Nome e Logotipo:** Crie um nome e um logotipo para sua empresa fictícia. O logo deve aparecer em todas as páginas!
* **REQ02 - Domínio:** Invente um domínio (tipo sua-empresa.com.br) para ser a URL da sua aplicação.
* **REQ03 - Funcionalidade:** A aplicação deve ser apenas CRUD. Nada de módulos extras!
* **REQ04 - Tabela:** Use uma única tabela no banco de dados, com no mínimo 3 e no máximo 10 colunas.
* **REQ05 - Linguagem e Frontend:** Em aula, usamos PHP, mas você pode usar outra linguagem. O frontend, porém, precisa ser HTML/CSS.
* **REQ06 - Sem Frameworks:** Evite frameworks, a menos que fale com o professor antes.
* **REQ07 - Banco de Dados:** Use um banco de dados acessível por rede. Pode ser MySQL/MariaDB (o que vimos em aula) ou outro de sua escolha. Nada de arquivos de texto ou SQLite.

**Passo II: Coloque tudo em Contêineres**
* **REQ08 - Docker:** pode utilizar apenas Docker, mas prefira trabalhar com Dockerfile e/ou Docker Compose para conteinerizar a aplicação da melhor forma possível.
* **REQ09 - Imagens:** Prefira as imagens oficiais do DockerHub. Se precisar de algo diferente, use imagens verificadas ou patrocinadas.
* **REQ10 - Personalização:** Precisa customizar alguma imagem? Use Dockerfile para isso e evite hospedá-la em um lugar remoto.
* **REQ11 - Roteiro:** Crie um roteiro ou um tutorial para guiar sua apresentação no vídeo. Ele vai te ajudar a mostrar os passos para rodar a aplicação.

**Passo III: Mostre um Diferencial**
Implemente algo que vá além do básico, mostrando sua criatividade e capacidade. O diferencial deve ser na infraestrutura, e não na aplicação em si.
* *Nota do Projeto:* O diferencial escolhido foi a implementação de uma Autoridade Certificadora (CA) local com roteamento HTTPS nativo e rede isolada.

**Passo IV: Prepare o Palco**
* **REQ12 - Topologia:** Prepare seu ambiente.
* **REQ13 - Cenário:** Pense na gravação como uma história: um profissional de DevOps subindo a aplicação e um cliente usando-a.
* **REQ14 - Qualidade:** A gravação da tela precisa ser nítida! Aumente as fontes para que o texto fique fácil de ler.

**Passo V: Grave seu Vídeo**
* **REQ15 - Rosto e Voz:** Seu rosto deve aparecer e sua voz precisa estar nítida. Queremos ver e ouvir quem fez o trabalho!
* **REQ16 - Duração:** O vídeo deve ter entre 7 e 12 minutos. Nem mais, nem menos. E por favor, não acelere o vídeo!

**Passo VI: Poste seu Vídeo**
* **REQ17 a REQ19:** Envio através de link não listado no YouTube ou Google Drive (com permissões corretas) e postagem no Moodle.

**Critérios de Avaliação e Pontuação**
* **CRIT01 - Atendimento aos Requisitos:** (REQ) cumpridos.
* **CRIT02 - Originalidade:** Trabalho autoral.
* **CRIT03 - Competência:** Compreensão do trabalho e capacidade de replicação.
* **CRIT04 - Diferencial:** (Passo III) Capacidade de ir além do básico.
</details>


