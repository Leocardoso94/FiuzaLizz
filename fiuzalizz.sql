-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Nov-2016 às 19:44
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fiuzalizz`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`login`, `senha`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `NomeCategoria` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`NomeCategoria`) VALUES
('Desodorante'),
('Kit'),
('Perfumes Feminino'),
('Perfumes Masculino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `CPF` varchar(20) COLLATE utf8_bin NOT NULL,
  `Nome` varchar(45) COLLATE utf8_bin NOT NULL,
  `Sobrenome` varchar(45) COLLATE utf8_bin NOT NULL,
  `Email` varchar(45) COLLATE utf8_bin NOT NULL,
  `Senha` varchar(45) COLLATE utf8_bin NOT NULL,
  `Sexo` char(1) COLLATE utf8_bin NOT NULL,
  `Data_Nascimento` date NOT NULL,
  `Status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `CPF`, `Nome`, `Sobrenome`, `Email`, `Senha`, `Sexo`, `Data_Nascimento`, `Status`) VALUES
(11, '430.633.508-93', 'Leonardo', 'Cardoso', 'leonardo.cardoso@kidzania.com.br', '123', 'm', '1994-10-20', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cobranca`
--

CREATE TABLE `cobranca` (
  `idCobranca` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `Pagamento` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `cobranca`
--

INSERT INTO `cobranca` (`idCobranca`, `idPedido`, `Pagamento`) VALUES
(2, 1, 0),
(3, 2, 0),
(4, 3, 0),
(5, 4, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `idCliente` int(11) NOT NULL,
  `Tipo` varchar(15) COLLATE utf8_bin NOT NULL,
  `Numero` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`idCliente`, `Tipo`, `Numero`) VALUES
(2, 'celular', '1139954500'),
(3, 'celular', '1139954500'),
(4, 'celular', '1139954500'),
(5, 'celular', '1139954500'),
(6, 'celular', '1139954500'),
(7, 'celular', '1139954500'),
(8, 'celular', '1139954500'),
(11, 'celular', '(11) 95174-0678');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idCliente` int(11) NOT NULL,
  `TipoEndereco` varchar(15) COLLATE utf8_bin NOT NULL,
  `CEP` varchar(10) COLLATE utf8_bin NOT NULL,
  `Rua` varchar(30) COLLATE utf8_bin NOT NULL,
  `Numero` int(11) NOT NULL,
  `Complemento` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Bairro` varchar(30) COLLATE utf8_bin NOT NULL,
  `Cidade` varchar(30) COLLATE utf8_bin NOT NULL,
  `Estado` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`idCliente`, `TipoEndereco`, `CEP`, `Rua`, `Numero`, `Complemento`, `Bairro`, `Cidade`, `Estado`) VALUES
(11, 'residencial', '05.402-600', 'Av. Rebouças', 200, 'a', 'Pinheiros', 'São Paulo', 'SP'),
(12, 'residencial', '05.402-600', 'Av. Rebouças, 3970', 300, '300', '212', 'São Paulo', 'São paulo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrega`
--

CREATE TABLE `entrega` (
  `idEntrega` int(11) NOT NULL,
  `Tipo` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `PrazoEntrega` int(11) NOT NULL,
  `Custo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `entrega`
--

INSERT INTO `entrega` (`idEntrega`, `Tipo`, `PrazoEntrega`, `Custo`) VALUES
(1, 'Nosso Carro', 5, 30),
(2, 'Sedex', 3, 50),
(3, 'PAC', 8, 20),
(4, 'Entrega Grátis', 10, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `Nome` varchar(30) NOT NULL,
  `Descricao` varchar(500) DEFAULT NULL,
  `imagem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`Nome`, `Descricao`, `imagem`) VALUES
('ACQUA DI PARMA', 'Acqua di Parma exalta a essÃªncia italiana em todas as formas e expressÃµes. Se destaca em tradiÃ§Ã£o e se caracteriza por uma moderna interpretaÃ§Ã£o do luxo: a meticulosa atenÃ§Ã£o pelos detalhes, a preocupaÃ§Ã£o em utilizar apenas os melhores materiais, uma fÃ¡brica de produÃ§Ã£o artesanal, criaÃ§Ãµes de estilo inimitÃ¡veis, criando um mundo de discretos luxos, feito para pessoas que amam o melhor da vida.', 'images/marca/acqua_grande.jpg'),
('ANIMALE', 'A Animale foi criada por Suzanne de Lyon em setembro de 1991. Sua proposta ï¿½ retratar homens e mulheres de instintos felinos e sensuais, que refletem atravï¿½s do seu aroma todo o seu magnetismo e seduï¿½ï¿½o. O pï¿½blico da Animale sï¿½o pessoas marcantes, misteriosas e cativantes, que marcam a sua presenï¿½a em qualquer lugar e a qualquer hora, prezando acima de tudo, a sua liberdade.', 'images/marca/animale.jpg'),
('AZZARO', 'O perfume é um elemento de sedução em toda a parte para a marca Azzaro. Para continuar a busca de novas emoções, a marca compõe os seus perfumes em colaboração com criadores muito talentosos. Além disso, ela permanece fiel a uma tradição: a pesquisa de alquimias inéditas e sintonias inovadoras, uma obsessão pela qualidade dos odores e pela escolha das matérias mais nobres. Entre elas, encontram-se belas matérias naturais, utilizadas em abundância nos perfumes Azzaro. Inspirados pelo estilo de vi', 'images/marca/azzaro_485x90.jpg'),
('BRITNEY SPEARS', 'Cantora, compositora, dançarina e atriz, Britney Spears é uma das mais famosas e admiradas artista no mundo do entretenimento. Lançou em setembro de 2004 sua primeira fragrância, e mais de 30 milhões de frascos já foram vendidos em todo o mundo.', 'images/marca/britneyspears.jpg'),
('BURBERRY', 'Em 1856 o jovem Thomas Burberry abriu sua primeira loja em Hampshire, a T. Burberry & Sons. Mais tarde, associado a uma tecelagem de algodão, Burberry inventou o Gabardine, um casaco que se tornaria um padrão para os produtos do gênero. Feito à prova dágua e largo o suficiente para ser usado sobre costumes e vestidos, o Gabardine foi um grande sucesso devido a sensibilidade e criatividade de Thomas Burberry. A Burberry é uma marca icônica britânica sinônimo de inovação e qualidade. Sediada em L', 'images/marca/burberry.jpg'),
('Bvlgari', 'Bulgari traz a excelência e competência de sua herança única de joias para o universo das fragrâncias com perfumes masculinos, femininos e unissex. A visão de Bvlgari é unir talentosos designers e criadores com perfumistas de prestígio. Cada fragrância, cada perfume Bvlgari, é uma expressão de luxo, capturando a sofisticação e elegância da marca.Confira as novidades em perfumes Bvlgari, os perfumes mais vendidos e as promoções aqui no site da FiuzaLizz.', 'images/marca/bvlgari.jpg'),
('CALVIN KLEIN', 'Símbolo da vanguarda no universo de perfumaria, Calvin Klein lançou ícones mundiais como o perfume CK One, Eternity, Euphoria e CKIN2U. Fragrâncias que marcaram gerações e continuam traduzindo estilos de vida e comportamento.Na Sephora, além dos consagrados perfumes masculinos, femininos e unissex da Calvin Klein, você encontra produtos de Corpo e Banho e Presentes, como miniaturas de perfumes para homens e mulheres. ', 'images/marca/calvinklein.jpg'),
('Carolina Herrera', 'Há mais de 30 anos Carolina Herrera fundou sua empresa. Com sucesso quase imediato, produzindo modelos de roupas clássicos e luxuosos, conquistou famosas como Jacqueline Kennedy Onassis. Seus perfumes, masculinos e femininos, conquistaram o mundo pela sofisticação e elegância, com fragrâncias muito marcantes. Confira as novidades em perfumes Carolina Herrera, os perfumes mais vendidos e as ofertas que você encontra na Sephora.', 'images/marca/carolina.jpg'),
('Deva Curl', 'Deva foi uma das primeiras marcas de cabelos a substituir produtos pesados e que causavam danos aos fios por ingredientes hidratantes e com extratos botânicos em sua fórmula. Hoje, a marca Deva oferece uma linha completa sem sulfato, silicone e sem parabeno nos seus produtos para limpeza, hidratação, estilização garantindo a saúde dos fios. Os produtos restauram e respeitam a essência natural dos cabelos.', 'images/marca/DevaCurl_Logo1.jpg'),
('Dior', 'De maquiagens inspiradas nos desfiles de moda a tratamentos de última geração, a Christian Dior fabrica alguns dos produtos de beleza mais sofisticados e inovadores do mercado. É a combinação entre alta costura e fragrâncias atemporais que solidificou a reputação da Dior como uma das marcas de beleza mais desejadas do mundo; atraindo a alta sociedade, modelos e celebridades.', 'images/marca/dior.jpg'),
('Ferrari', 'A Ferrari é a mais famosa escuderia da Fórmula 1, com seu charme único. Fundada em 1929 é a única equipe que participou de todos os mundiais de F1, com grandes carros e pilotos da história, que passaram pela escuderia. A Ferrari não ficou restrita à Fórmula 1, expandindo o prestígio da marca para o universo das fragrâncias.', 'images/marca/F.jpg'),
('GIORGIO ARMANI', 'No circuito internacional da moda Giorgio Armani ï¿½ conhecido como o imperador de Milï¿½o. Armani ï¿½ uma das marcas com mais forï¿½a e estilo na atualidade, e seu criador, Giorgio Armani, ï¿½ um dos maiores estilistas de todos os tempos. Giorgio Armani tornou-se grife em 1975, pela qual tambï¿½m lanï¿½ou peï¿½as para casa, uma linha banho e perfumes. Atualmente, a grife do imperador de Milï¿½o estï¿½ no Brasil e em diversos paï¿½ses.', 'images/marca/giorgioarmani.jpg'),
('GIVENCHY', 'Hubert de Givenchy foi reconhecido como um dos mais reverenciados criadores de moda do mundo, com uma cartela de clientes composta pelas mulheres mais bem vestidas de todos os tempos. FragrÃ¢ncias, cosmÃ©ticos e produtos de tratamento da Givenchy sÃ£o tÃ£o preciosos como sua alta costura, com fÃ³rmulas personalizadas e inovadoras, com garantia de alta performance. Uma mistura de elegÃ¢ncia do estilo francÃªs com a espontaneidade do estilo americano, mais um toque de algo muito chique, muito irre', 'images/marca/givenchy.jpg'),
('HÃˆRMES', 'A perfumaria entrou para a histÃ³ria de HermÃ¨s logo no inÃ­cio. Originais e autÃªnticos, cada perfume conta uma histÃ³ria distinta. Cada fragrÃ¢ncia Ã© uma expressÃ£o artÃ­stica criada para dar prazer e harmonia aos sentidos, e foram desenvolvidas por Jean-Claude Ellena, perfumista da casa.', 'images/marca/hÃ¨rmes.png'),
('JEAN PAUL GAULTIER', 'Jean Paul Gaultier cria suas fragrÃ¢ncias como uma segunda pele. Refletindo absolutamente sua personalidade. Generoso, sensual e atraente, trazendo uma impressÃ£o inesquecÃ­vel ...Com fragrÃ¢ncias sedutoras e com personalidade.', 'images/marca/jeanpaulgaultieR.jpg'),
('LANCÃ”ME', 'A beleza Ã© uma rosa que LancÃ´me oferece Ã s mulheres. A Beleza das mulheres vai alÃ©m da aparÃªncia. Ã‰ uma emoÃ§Ã£o a flor da pele, um despertar dos sentidos, reflete uma harmonia entre o coraÃ§Ã£o, corpo e espÃ­rito. Acreditamos que cada mulher tem sua beleza e queremos dar a todos a liberdade para florescer, oferecendo nossas maiores inovaÃ§Ãµes cientÃ­ficas. Para LancÃ´me, a beleza do futuro serÃ¡ vibrante, generosa e plural.', 'images/marca/lancome.jpg'),
('Paco Rabanne', 'Paco Rabanne é um nome conhecido em todo o mundo. Sua estreia no mundo da moda foi com inovadoras bijuterias e botões de plástico. Depois vieram os bordados, que revolucionavam com seus desenhos geométricos. Rabanne utilizou diversos materiais para confeccionar roupas como metal e papel com fita adesiva no lugar das costuras. A inovação também está presente em seus perfumes. O primeiro lançamento, Calandre, chamou a atenção por utilizar o chipre como nota básica, enquanto a moda eram as essência', 'images/marca/paco.jpg '),
('PRADA', 'O sucesso de Prada teve inÃ­cio em 1985, quando Miuccia Prada assumiu a empresa de artigos de couro de seu avÃ´. Logo decidiu criar uma mochila usando o nÃ¡ilon Pocono, material utilizado para fazer tendas militares. Acertou em cheio as necessidades da mulher moderna, que precisa de praticidade, mas nÃ£o abre mÃ£o da beleza. No mesmo estilo vieram as roupas e diversos acessÃ³rios de moda, cosmÃ©ticos e perfumes. Seus produtos encantaram as mulheres de vÃ¡rios paÃ­ses e transformaram a Prada em u', 'images/marca/prada.jpg'),
('RALPH LAUREN', 'Ralph Lauren Ã© um dos mais importantes estilistas do sÃ©culo 20, conhecido, aplaudido, comprado e copiado em todo o mundo. A sofisticaÃ§Ã£o sempre fora sua meta e os anos 70 deram inÃ­cio a uma avalanche da grife Ralph Lauren, com a coleÃ§Ã£o de roupas, perfumes, acessÃ³rios e sua home collection, linha de artigos para casa, de delicados objetos de porcelana a preciosos tapetes orientais. Das roupas Ã  decoraÃ§Ã£o de interiores, a assinatura de Ralph Lauren sempre garantiu, mais do que moda, um', 'images/marca/ralphlauren.jpg'),
('YVES SAINT LAURENT', 'Yves Saint Laurent alimenta sua imaginaÃ§Ã£o com suas viagens e fotos de lugares distantes, que abrem todas as suas potencialidades criativas. Ã‰ um verdadeiro visionÃ¡rio, que embeleza as mulheres, sem nunca se impor sobre elas. Ele estÃ¡ atento a cada histÃ³ria de vida e revela a beleza em toda sua diversidade e riqueza, como um discreto embaixador da graÃ§a e sensualidade.', 'images/marca/yves-saint-lauren_485x90.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notafiscal`
--

CREATE TABLE `notafiscal` (
  `idNotaFiscal` int(11) NOT NULL,
  `Pedido_idPedido` int(11) NOT NULL,
  `Danfe` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `idTracking` int(11) DEFAULT NULL,
  `idEntrega` int(11) NOT NULL,
  `idPagamento` int(11) NOT NULL,
  `idClientes` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`idPedido`, `idTracking`, `idEntrega`, `idPagamento`, `idClientes`, `total`) VALUES
(1, NULL, 1, 1, 11, 1209.8),
(2, NULL, 4, 1, 11, 3732.7),
(3, NULL, 2, 1, 11, 1367.9),
(4, NULL, 2, 1, 11, 1367.9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Marca` varchar(30) NOT NULL,
  `Categoria` varchar(30) NOT NULL,
  `Peso` decimal(10,0) NOT NULL,
  `Estoque` int(11) NOT NULL,
  `Descricao` varchar(5000) NOT NULL,
  `Preco` double NOT NULL,
  `numeroVendas` int(11) NOT NULL,
  `Imagem` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `Nome`, `Marca`, `Categoria`, `Peso`, `Estoque`, `Descricao`, `Preco`, `numeroVendas`, `Imagem`) VALUES
(1, 'BVLGARI BLACK', 'Bvlgari', 'Perfumes', '75', 8, 'Fresco aromático, com notas de pêra, flores de alecrim, cipreste e almíscar. Para o homem determinado e completamente positivo.', 589.9, 5, 'images/produto/bvlgariblack.jpg'),
(2, 'DIOR HOMME  EAU DE TOILETTE', 'Dior', 'Perfumes', '100', 0, 'MagnÃ­fico', 459, 7, 'images/produto/diorhomme.jpg'),
(3, 'HIGHER TOILETTE', 'Dior', 'Perfumes', '100', 1, 'Fresco aromático, com notas de pêra, flores de alecrim, cipreste e almíscar. Para o homem determinado e completamente positivo.', 359, 2, 'images/produto/diorhigher.jpg'),
(24, 'DIOR HOMME INTENSE', 'Dior', 'Perfumes', '1', 12, 'melhor a´´', 219, 0, 'images/produto/DIOR HOMME INTENSE MASCULINO EAU DE PARFUM-500x500.jpg'),
(33, '1 MILLION DESODORANTE', 'Paco Rabanne', 'Desodorante', '150', 4, 'Paco Rabanne apresenta seu mais novo desodorante, com uma fragrância para os homens sedutores e modernos. Refrescante e sensual, com notas especiadas e brilhante como o ouro! A arma deste novo sedutor se chama 1 Million.\n\n1 Million Desodorante possui o nome da fragrância impresso em sua embalagem com o mesmo estilo de tipografia dos tempos do Velho Oeste, representando poder, prosperidade, luxo e durabilidade. Segundo seu criador, em todas as civilizações e religiões, o ouro sempre seduziu as ', 150, 3, 'images/produto/1million.jpg'),
(34, 'ETERNITY MASCULINO EAU DE TOIL', 'CALVIN KLEIN', 'Perfumes Masculino', '100', 100, 'Floral amadeirado, para o homem moderno, sensÃ­vel e famÃ­lia. Suas notas combinam mandarim, lavanda, jasmim, manjericÃ£o, Ã¢mbar e sÃ¢ndalo.', 506, 5, 'images/produto/CKETERNITY100ML.jpg'),
(35, 'AZZARO POUR HOMME MASCULINO EA', 'AZZARO', 'Perfumes Masculino', '200', 100, 'Azzaro Pour Homme Ã© um coquetel exclusivo de humor, vitalidade, modernidade e elegÃ¢ncia masculina, espelhado em seu criador Loris Azzaro.\r\nA intuitiva e inovadora alquimia harmonizam cerca de 320 elementos, dos quais mais da metade sÃ£o de origem natural. FougÃ¨re aromÃ¡tico, para o homem sedutor, viril e clÃ¡ssico. Suas notas combinam gerÃ¢nio de Bourbon, Ã¢mbar, sÃ¢ndalo, vetiver e musgo de carvalho.\r\nUm grande clÃ¡ssico da seduÃ§Ã£o, especialmente desenvolvido para o homem determinado, conf', 499, 15, 'images/produto/AZZARO POUR HOMME MASCULINO EAU DE TOILETTE.jpg'),
(36, 'AZZARO WANTED MASCULINO EAU DE', 'AZZARO', 'Perfumes Masculino', '100', 100, 'A histÃ³ria de Azzaro Wanted Ã© a histÃ³ria de um homem desejado. Azzaro Wanted Ã© o perfume de um homem que consegue tudo, para o qual tudo Ã© possÃ­vel. Um homem vibrante, brilhante, solar, atraente, invejado pelos homens e desejado pelas mulheres. Livre e ousado, vive sua vida como bem quer, pronto para seguir seu instinto e mudar as regras do jogo a qualquer instante. Audacioso, aposta em sua sorte com uma seguranÃ§a inabalÃ¡vel e ousa desafiar seu destino para chegar aonde quer.\r\n\r\nO frasco', 479, 12, 'images/produto/AZZARO WANTED MASCULINO EAU DE TOILETTE.jpg'),
(37, 'DOLCE&GABBANA MASCULINO EAU DE', 'DOLCE&GABBANA', 'Perfumes Masculino', '125', 100, 'Frutal amadeirado, com notas de laranja, bergamota, limÃ£o, tangerina, lavanda, sÃ¢ndalo e cedro. Para homens distintos e que tÃªm personalidade prÃ³pria.', 541, 10, 'images/produto/DOLCE&GABBANA MASCULINO EAU DE TOILETTE.jpg'),
(38, '212 SEXY MASCULINO EAU DE TOIL', 'CAROLINA HERRERA', 'Perfumes Masculino', '100', 100, 'New York: A cidade da SeduÃ§Ã£o! \r\nA noite estÃ¡ sÃ³ comeÃ§ando na cidade que nunca dorme...\r\n\r\nNew York Ã© a cidade mais sexy do mundo: com seu horizonte dramÃ¡tico, sua filosofia moderna, e suas noites mÃ¡gicas.\r\n\r\nUrbano, moderno e dinÃ¢mico como o homem 212. Ã‰ tambÃ©m misterioso, elegante e sobretudo um sedutor nato, o homem ideal para a mulher dinÃ¢mica, feminina, sensual e sedutora.\r\n\r\nFrescor cÃ­trico das notas de bergamota, mandarina, gengibre. Sensualidade especiada das notas gardÃªnia', 439, 20, 'images/produto/212 SEXY MASCULINO EAU DE TOILETTE.jpg'),
(39, ' CH MEN MASCULINO EAU DE TOILE', 'CAROLINA HERRERA', 'Perfumes Masculino', '100', 100, 'CH Men tem o mesmo princÃ­pio de "Luxo Casual", encontrado na linha feminina. Suas coleÃ§Ãµes sÃ£o feitas sob medida para homens com nÃ­tido critÃ©rio de estÃ©tica e um requintado gosto para a moda, com um toque pessoal.\r\n\r\nO homem CH respira elegÃ¢ncia em todos os momentos do seu dia, em todos os aspectos da sua vida, ele vive intensamente cada momento e combina as diferentes facetas da sua vida com perfeiÃ§Ã£o, sempre com profissionalismo e personalidade. CH Men Ã© uma fusÃ£o entre a tradiÃ§Ã£', 479, 23, 'images/produto/CH MEN MASCULINO EAU DE TOILETTE.jpg'),
(40, 'GENTLEMEN MASCULINO EAU DE TOI', 'GIVENCHY', 'Perfumes Masculino', '100', 100, 'Amadeirado aromÃ¡tico, com notas de canela, bergamota, patchouli, vetiver, sÃ¢ndalo, rosa e couro da RÃºssia. Para homens contemporÃ¢neos e auto-confiantes.', 459, 2, 'images/produto/GENTLEMEN MASCULINO EAU DE TOILETTE.jpg'),
(41, 'GIVENCHY PI MASCULINO EAU DE T', 'GIVENCHY', 'Perfumes Masculino', '30', 100, 'Amadeirado energÃ©tico, para homens sonhadores, expressivos e modernos. Suas notas combinam flor de laranjeira, tangerina, alecrim, baunilha e manjericÃ£o.', 219, 1, 'images/produto/GIVENCHY PI MASCULINO EAU DE TOILETTE.jpg'),
(42, 'COLÃ”NIA LEATHER MASCULINA EAU', 'ACQUA DI PARMA', 'Perfumes Masculino', '100', 100, 'Uma fragrÃ¢ncia original e elegante que nasce da uniÃ£o de duas famÃ­lias olfativas: as frescas e vibrantes notas da Colonia e o luxuoso e preciosio acorde do couro.\r\n\r\nUma composiÃ§Ã£o que ressalta a frescura das melhores notas cÃ­tricas da laranja brasileira e do LimÃ£o Siciliano, evoluindo para o coraÃ§Ã£o com a Rosa e o Petitgrain Paraguaio e que sublima na uniÃ£o do acorde do couro e das madeiras de Cedro e do Guaiac. ', 795, 30, 'images/produto/COLÔNIA LEATHER MASCULINA EAU DE COLÔNIA.jpg'),
(43, 'ACQUA DI GIO ESSENZA MASCULINO', 'GIORGIO ARMANI', 'Perfumes Masculino', '100', 100, 'Uma nova interpretaÃ§Ã£o da Acqua Di GiÃ², um Eau de Parfum, criado por Alberto Morillas, que evoluiu a partir de seu antecessor.\r\n\r\nNas notas de cabeÃ§a, Cascalone, um novo ingrediente utilizado pela primeira vez na perfumaria, e que combina perfeitamente com a Bergamota Siciliana e a Grapefruit criando um contraste que produz vibraÃ§Ã£o.\r\n\r\nNas de coraÃ§Ã£o, Paradisone, um ingrediente capaz de iluminar tudo ao seu redor sem ofuscar qualquer outro elemento.', 599, 21, 'images/produto/ACQUA DI GIO ESSENZA MASCULINO EAU DE PARFUM.jpg'),
(44, 'ARMANI EAU DE NUIT MASCULINO E', 'GIORGIO ARMANI', 'Perfumes Masculino', '100', 100, 'Eau de Nuit Ã© uma interpretaÃ§Ã£o do coraÃ§Ã£o da noite italiana.Ã‰ para o homem Ã  procura de uma fragrÃ¢ncia sensual, intensa e viciante.Uma mistura do frescor aromÃ¡tico da pimenta rosa e da sensualidade viciante do tabaco.', 749, 23, 'images/produto/ARMANI EAU DE NUIT MASCULINO EAU DE TOILETTE.jpg'),
(45, 'ARMANI EAU POUR HOMME EAU DE T', 'GIORGIO ARMANI', 'Perfumes Masculino', '100', 100, 'A traduÃ§Ã£o da elegÃ¢ncia e masculinidade...Destinada para o homem Ã  procura de uma fragrÃ¢ncia atemporal, elegante e refinada. Um percursor na histÃ³ria das fragrÃ¢ncias:O primeiro citrus-chypre criado em 1984.', 749, 12, 'images/produto/ARMANI EAU POUR HOMME EAU DE TOILETTE MASCULINO.jpg'),
(46, 'Kit Perfume 1 Million EDT 100ml + Desodorante 150ml Masculino Paco Rabanne', 'Paco Rabanne', 'Kit', '300', 5, '1 Million EDT, feito para homens conectados, com ego alto e personalidade forte.\r\nO design da embalagem1 Million EDT, fei é perfeito: um retângulo dourado com linhas retas e simétricas com a gravação de um número de série na parte inferior, exatamente como as barras de ouro - eterno símbolo de poder para homens.\r\nUma fragrância leve e fresca: as primeiras notas vêm com toques de mandarina e hortelã; nas notas de coração, absoluto de rosa e canela; e nas notas de fundo, acorde de couro de âmbar. ', 395.12, 2, 'images/produto/25587_3_desc_30.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_pedido`
--

CREATE TABLE `produto_pedido` (
  `idProduto` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `Quantidade` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `produto_pedido`
--

INSERT INTO `produto_pedido` (`idProduto`, `idPedido`, `Quantidade`) VALUES
(1, 1, 2),
(1, 2, 3),
(1, 3, 1),
(1, 4, 1),
(3, 2, 2),
(3, 3, 1),
(3, 4, 1),
(24, 2, 5),
(24, 3, 1),
(24, 4, 1),
(33, 2, 1),
(33, 3, 1),
(33, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_pagamento`
--

CREATE TABLE `tipo_pagamento` (
  `idPagamento` int(11) NOT NULL,
  `NomedoTipo` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tipo_pagamento`
--

INSERT INTO `tipo_pagamento` (`idPagamento`, `NomedoTipo`) VALUES
(1, 'PagSeguro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tracking`
--

CREATE TABLE `tracking` (
  `idTracking` int(11) NOT NULL,
  `Status` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `Data_Status` date DEFAULT NULL,
  `Hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`login`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`NomeCategoria`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cobranca`
--
ALTER TABLE `cobranca`
  ADD PRIMARY KEY (`idCobranca`),
  ADD KEY `Cobranca_FKIndex1` (`idPedido`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`idEntrega`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`Nome`),
  ADD UNIQUE KEY `Nome` (`Nome`);

--
-- Indexes for table `notafiscal`
--
ALTER TABLE `notafiscal`
  ADD PRIMARY KEY (`idNotaFiscal`),
  ADD KEY `NotaFiscal_FKIndex1` (`Pedido_idPedido`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `Pedido_FKIndex1` (`idClientes`),
  ADD KEY `Pedido_FKIndex2` (`idPagamento`),
  ADD KEY `Pedido_FKIndex3` (`idEntrega`),
  ADD KEY `Pedido_FKIndex4` (`idTracking`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`),
  ADD KEY `Produto_FKIndex1` (`Categoria`),
  ADD KEY `Produto_FKIndex2` (`Marca`);

--
-- Indexes for table `produto_pedido`
--
ALTER TABLE `produto_pedido`
  ADD PRIMARY KEY (`idProduto`,`idPedido`),
  ADD KEY `Produto_has_Pedido_FKIndex1` (`idProduto`),
  ADD KEY `Produto_has_Pedido_FKIndex2` (`idPedido`);

--
-- Indexes for table `tipo_pagamento`
--
ALTER TABLE `tipo_pagamento`
  ADD PRIMARY KEY (`idPagamento`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`idTracking`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `cobranca`
--
ALTER TABLE `cobranca`
  MODIFY `idCobranca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `entrega`
--
ALTER TABLE `entrega`
  MODIFY `idEntrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notafiscal`
--
ALTER TABLE `notafiscal`
  MODIFY `idNotaFiscal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tipo_pagamento`
--
ALTER TABLE `tipo_pagamento`
  MODIFY `idPagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `idTracking` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
