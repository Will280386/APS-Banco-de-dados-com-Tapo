-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Nov-2019 às 03:26
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baseproj`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_autor` int(11) DEFAULT NULL,
  `id_postagem` int(11) DEFAULT NULL,
  `comentario` varchar(800) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_autor`, `id_postagem`, `comentario`, `data`) VALUES
(2, 2, 1, 'Percorre o Array e verifica se i > 0 se sim counter++;', '2019-11-28 06:42:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcacoes`
--

CREATE TABLE `marcacoes` (
  `id_marcacao` int(11) NOT NULL,
  `id_marcador` int(11) DEFAULT NULL,
  `id_postagem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marcacoes`
--

INSERT INTO `marcacoes` (`id_marcacao`, `id_marcador`, `id_postagem`) VALUES
(1, 4, 1),
(2, 1, 2),
(3, 3, 3),
(4, 2, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcadores`
--

CREATE TABLE `marcadores` (
  `id_marcador` int(11) NOT NULL,
  `marcador` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marcadores`
--

INSERT INTO `marcadores` (`id_marcador`, `marcador`) VALUES
(1, 'Php'),
(2, 'Html'),
(3, 'Java'),
(4, 'Javascript'),
(5, 'Python'),
(6, 'Mysql');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `id_notificacao` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_comentario` int(11) NOT NULL,
  `notificacao` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `notificacoes`
--

INSERT INTO `notificacoes` (`id_notificacao`, `id_usuario`, `id_comentario`, `notificacao`) VALUES
(2, 1, 2, 'O Usuario Joao Gabriel comentou na sua pergunta \'Metodo para quantificar apenas os valores positivos e ignorar os negativos\'');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `idPergunta` int(11) NOT NULL,
  `pergunta` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`idPergunta`, `pergunta`) VALUES
(1, 'Cor Preferida?'),
(2, 'Data de Nascimento'),
(3, 'Mora Onde?'),
(4, 'Nome do Cachorro?'),
(5, 'Nome do Primeiro Professor?');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagens`
--

CREATE TABLE `postagens` (
  `id_postagem` int(11) NOT NULL,
  `id_autor` int(11) DEFAULT NULL,
  `titulo` varchar(250) NOT NULL,
  `descricao` varchar(800) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `postagens`
--

INSERT INTO `postagens` (`id_postagem`, `id_autor`, `titulo`, `descricao`, `data`) VALUES
(1, 1, 'Metodo para quantificar apenas os valores positivos e ignorar os negativos', 'Bom pessoal, seguinte, preciso que minha funÃ§Ã£o some a quantidade de valores positivos dentro de um array e ignore os negativos. EntÃ£o, se um array tem os valores [10,11,-5] minha funÃ§Ã£o deve retornar 2, porque apenas 2 valores aÃ­ dentro sÃ£o positivos e o -5 Ã© negativo.\r\n\r\nMas atÃ© o momento nÃ£o consigo formular o if.\r\n', '2019-11-28 06:32:47'),
(2, 2, 'Salvar formulÃ¡rio PHP PDO Banco de Dados', 'Primeiro esclareÃ§o que meu conhecimento em PHP Ã© bÃ¡sico e em MYSQL praticamente nulo... Meu objetivo Ã©: Salvar dados do formulÃ¡rio (3 pÃ¡ginas) no mesmo ID (mesma linha) do banco de dados.\r\nO problema, Ã© que ao enviar o formulÃ¡rio com action=\"2.php\" cujo arquivo possui o mesmo cÃ³digo que o \"1.php\" mudando somente os dados recebidos,\r\n\r\nNo Banco de Dados Ã© criado um novo ID(2) ou seja, uma nova linha, com os dados atuais nas colunas (cidade, endereÃ§o, cep) preenchidos, e as colunas anteriores (nome, sobrenome, sexo) vazias...\r\n\r\nPessoal esta Ã© a minha dÃºvida, como resolver, salvar todos os dados num mesmo id, mesma linha. O cÃ³digo do arquivo 2.php Ã© o mesmo pois nÃ£o faÃ§o ideia de como implementar isso, como em soluÃ§Ãµes anteriores tais dados costumava enviar com PhpMailer p', '2019-11-28 06:39:44'),
(3, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti blanditiis quibusdam cumque, pariatur totam, a quis nostrum eos fugiat ab vero, doloribus corporis non magnam soluta aspernatur reprehenderit aliquam voluptatem.Lorem ipsum dolor sit ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti blanditiis quibusdam cumque, pariatur totam, a quis nostrum eos fugiat ab vero, doloribus corporis non magnam soluta aspernatur reprehenderit aliquam voluptatem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia esse tempore, quibusdam quia quam enim cum aut accusamus numquam nostrum magnam quae, consectetur non. Eligendi in laudantium necessitatibus unde accusamus.', '2019-11-29 02:18:00'),
(4, 1, 'count($vetor)', 'count($vetor)count($vetor)count($vetor)count($vetor)count($vetor)count($vetor)count($vetor)count($vetor)count($vetor)count($vetor)count($vetor)count($vetor)count($vetor)', '2019-11-29 02:22:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(100) NOT NULL,
  `nome` text NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `perSeg` int(11) NOT NULL,
  `resp` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `matricula` bigint(15) NOT NULL,
  `dataCad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `perSeg`, `resp`, `telefone`, `email`, `matricula`, `dataCad`) VALUES
(1, 'Lucas Mendes', 'lusca', '123', 1, 'blue', '(81) 9 9295-6581', 'lucas1999mendes@gmail.com', 201806442, '2019-11-28 06:31:38'),
(2, 'Joao Gabriel', 'Jgsilva', '123', 3, 'Recife', '(81) 9 9595-9595', 'Jgsilva2014@gmail.com', 201806443, '2019-11-28 06:35:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_autor` (`id_autor`),
  ADD KEY `id_postagem` (`id_postagem`);

--
-- Indexes for table `marcacoes`
--
ALTER TABLE `marcacoes`
  ADD PRIMARY KEY (`id_marcacao`),
  ADD KEY `id_marcador` (`id_marcador`),
  ADD KEY `id_postagem` (`id_postagem`);

--
-- Indexes for table `marcadores`
--
ALTER TABLE `marcadores`
  ADD PRIMARY KEY (`id_marcador`);

--
-- Indexes for table `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id_notificacao`),
  ADD KEY `id_comentario` (`id_comentario`),
  ADD KEY `id_usuario` (`id_usuario`) USING BTREE;

--
-- Indexes for table `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`idPergunta`);

--
-- Indexes for table `postagens`
--
ALTER TABLE `postagens`
  ADD PRIMARY KEY (`id_postagem`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marcacoes`
--
ALTER TABLE `marcacoes`
  MODIFY `id_marcacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marcadores`
--
ALTER TABLE `marcadores`
  MODIFY `id_marcador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id_notificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `idPergunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `postagens`
--
ALTER TABLE `postagens`
  MODIFY `id_postagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_postagem`) REFERENCES `postagens` (`id_postagem`);

--
-- Limitadores para a tabela `marcacoes`
--
ALTER TABLE `marcacoes`
  ADD CONSTRAINT `marcacoes_ibfk_1` FOREIGN KEY (`id_marcador`) REFERENCES `marcadores` (`id_marcador`),
  ADD CONSTRAINT `marcacoes_ibfk_2` FOREIGN KEY (`id_postagem`) REFERENCES `postagens` (`id_postagem`);

--
-- Limitadores para a tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD CONSTRAINT `notificacoes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `notificacoes_ibfk_2` FOREIGN KEY (`id_comentario`) REFERENCES `comentarios` (`id_comentario`);

--
-- Limitadores para a tabela `postagens`
--
ALTER TABLE `postagens`
  ADD CONSTRAINT `postagens_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
