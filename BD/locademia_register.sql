-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: locademia
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agenda` (
  `CI` int NOT NULL,
  `matricula` varchar(50) NOT NULL,
  `dia` date NOT NULL,
  `hora_comienzo` time NOT NULL,
  `hora_fin` time NOT NULL,
  PRIMARY KEY (`CI`),
  UNIQUE KEY `CI` (`CI`),
  KEY `matricula` (`matricula`),
  CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`CI`) REFERENCES `cuenta` (`CI`),
  CONSTRAINT `agenda_ibfk_2` FOREIGN KEY (`matricula`) REFERENCES `automoviles` (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda`
--

LOCK TABLES `agenda` WRITE;
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `automoviles`
--

DROP TABLE IF EXISTS `automoviles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `automoviles` (
  `CI` int NOT NULL,
  `matricula` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`matricula`),
  UNIQUE KEY `CI` (`CI`),
  CONSTRAINT `automoviles_ibfk_1` FOREIGN KEY (`CI`) REFERENCES `chofer` (`CI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `automoviles`
--

LOCK TABLES `automoviles` WRITE;
/*!40000 ALTER TABLE `automoviles` DISABLE KEYS */;
INSERT INTO `automoviles` VALUES (12345678,'AAF-2647','A','Nissan Versa 2018','locademia/img/Versa.png'),(78534682,'AAR-7859','B','Volkswagen UP','locademia/img/Up.png'),(23456789,'AAW-8562','A','Tesla Model S','locademia/img/ModelS.png'),(86512403,'ASD-2245','B','Volkswagen Golf','locademia/img/Golf.png'),(75413025,'BHM-7234','C','Fiat 500','locademia/img/Fiat500.png'),(32562478,'CXB-3259','C','Smart ForTwo','locademia/img/Smart.png'),(76521452,'FBG-3201','B','Peugeot 208','locademia/img/208.png'),(96325632,'GIJ-6322','A','Honda Civic','locademia/img/Civic.png'),(96336958,'IJO-4785','C','Volkswagen Beetle','locademia/img/Beetle.png'),(32445862,'JLP-8832','B','Ford Focus','locademia/img/Focus.png'),(98765432,'QFR-781','A','Mitubishi Lancer','locademia/img/Lancer.png'),(54789215,'TMR-4756','C','Tyota ae86','locademia/img/ae86.png');
/*!40000 ALTER TABLE `automoviles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chofer`
--

DROP TABLE IF EXISTS `chofer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chofer` (
  `CI` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `turno` int NOT NULL,
  PRIMARY KEY (`CI`),
  UNIQUE KEY `CI` (`CI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chofer`
--

LOCK TABLES `chofer` WRITE;
/*!40000 ALTER TABLE `chofer` DISABLE KEYS */;
INSERT INTO `chofer` VALUES (12345678,'jose','jose','123456789','jose@locademia.com','casadeJose',1),(23456789,'pepe','pepe','987654321','pepe@locademia.com','casadePepe',2),(32445862,'juaquim','sandoval','785486821','juaquim@locademia.com','casadeJuaquim',4),(32562478,'clotilde','reyes','764032492','clotilde@locademia.com','casadeClotilde',4),(54789215,'imanol','quintana','082318258','imanol@locademia.com','casadeImanol',3),(75413025,'eusebio','martin','963029153','eusebio@locademia.com','casadeEusebio',1),(76521452,'violeta','maza','964723014','violeta@locademia.com','casadeVioleta',3),(78534682,'mauricio','espinoza','854103268','mauricio@locademia.com','casadeMauricio',1),(86512403,'santiago','vasquez','214503751','santiago@locademia.com','casadeSantiago',2),(96325632,'alejandro','svin','753684219','alejandro@locademia.com','casadeAlejandro',4),(96336958,'fernanda','osorio','741289304','fernanda@locademia.com','casadeFernanda',2),(98765432,'svin','svin','564782318','svin@locademia.com','casadeSvin',3);
/*!40000 ALTER TABLE `chofer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `CI` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`CI`),
  UNIQUE KEY `CI` (`CI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (14785236,'humberto','coronado','147852369','humberto@mail.com','casadeHumberto',1),(85214796,'stefan','almeida','852147963','stefan@mail.com','casadeStefan',1),(96325874,'jacinta','velazquez','963258741','jacinta@mail.com','casadeJacinta',1);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrato`
--

DROP TABLE IF EXISTS `contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contrato` (
  `CI` int NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `fecha_contrato` date NOT NULL,
  `horas_efectuadas` int NOT NULL,
  `horas_reservadas` int NOT NULL,
  PRIMARY KEY (`CI`),
  UNIQUE KEY `CI` (`CI`),
  CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`CI`) REFERENCES `cliente` (`CI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrato`
--

LOCK TABLES `contrato` WRITE;
/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
INSERT INTO `contrato` VALUES (14785236,'C','2021-04-06',0,6),(85214796,'B','2021-04-10',0,12),(96325874,'A','2021-03-15',0,25);
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuenta`
--

DROP TABLE IF EXISTS `cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuenta` (
  `CI` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `CI` (`CI`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`CI`) REFERENCES `cliente` (`CI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta`
--

LOCK TABLES `cuenta` WRITE;
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
INSERT INTO `cuenta` VALUES (14785236,'a','a');
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-29 14:20:08
