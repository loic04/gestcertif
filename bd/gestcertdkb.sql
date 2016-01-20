/*
Navicat MySQL Data Transfer

Source Server         : lolo
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : gestcertdkb

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2016-01-20 16:16:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `activity_log`
-- ----------------------------
DROP TABLE IF EXISTS `activity_log`;
CREATE TABLE `activity_log` (
  `activity_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  PRIMARY KEY (`activity_log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of activity_log
-- ----------------------------
INSERT INTO `activity_log` VALUES ('24', 'lolo', '2016-01-12 17:36:26', 'Ajouter client Kouadou ');
INSERT INTO `activity_log` VALUES ('26', 'lolo', '2016-01-12 17:43:17', 'Ajouter client koua ');
INSERT INTO `activity_log` VALUES ('27', 'lolo', '2016-01-12 22:48:49', 'Ajouter Certificat SSL EV(100000)  ');
INSERT INTO `activity_log` VALUES ('29', 'lolo', '2016-01-14 17:17:25', 'Ajouter utilisateur taugy(taugylar brice)  ');
INSERT INTO `activity_log` VALUES ('30', 'taugy', '2016-01-15 21:58:02', 'Ajouter client Angora ');
INSERT INTO `activity_log` VALUES ('31', 'lolo', '2016-01-16 09:22:08', 'Ajouter utilisateur kouam(Kouame kouadio)  ');
INSERT INTO `activity_log` VALUES ('33', 'lolo', '2016-01-16 09:24:42', 'Ajouter utilisateur kouam(Kouame kouadio)  ');
INSERT INTO `activity_log` VALUES ('34', 'lolo', '2016-01-17 17:19:13', 'Modification du profil utilisateur  ');
INSERT INTO `activity_log` VALUES ('35', 'lolo', '2016-01-17 18:23:45', 'Ajouter utilisateur sylvia(Nguessan sylvia)  ');

-- ----------------------------
-- Table structure for `certificat`
-- ----------------------------
DROP TABLE IF EXISTS `certificat`;
CREATE TABLE `certificat` (
  `cert_id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_cert` longtext NOT NULL,
  `prix_cert` longtext NOT NULL,
  PRIMARY KEY (`cert_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=ascii;

-- ----------------------------
-- Records of certificat
-- ----------------------------
INSERT INTO `certificat` VALUES ('1', 'Personne physique', '70000');
INSERT INTO `certificat` VALUES ('2', 'SSL OV', '277300');
INSERT INTO `certificat` VALUES ('3', 'Cachet serveur', '463000');

-- ----------------------------
-- Table structure for `client`
-- ----------------------------
DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` longtext NOT NULL,
  `prenom_client` longtext NOT NULL,
  `emploi_client` longtext NOT NULL,
  `mail_client` longtext NOT NULL,
  `tel_client` longtext NOT NULL,
  `certificat_client` longtext NOT NULL,
  `certificat_num` longtext NOT NULL,
  `cart_ind` longtext NOT NULL,
  `entreprise` longtext NOT NULL,
  `nom_mandataire` longtext,
  `prenom_mandataire` longtext,
  `tel_mandataire` longtext,
  `mail_mandataire` longtext,
  `nom_rep_legal` longtext,
  `prenom_rep_legal` longtext,
  `tel_rep_legal` longtext,
  `mail_rep_legal` longtext,
  `enregistr_par` int(11) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=ascii;

-- ----------------------------
-- Records of client
-- ----------------------------
INSERT INTO `client` VALUES ('1', 'kesse', 'brice', 'informaticien', 'taugylar@gmail.com', '08010103', 'Cachet serveur', '09abc124571', 'CI209252722', 'DKBS', null, null, null, null, 'Djaha', 'bertin', '09090909', 'bertin.djaha@dkbsolutions.com', '7');
INSERT INTO `client` VALUES ('3', 'koua', 'erickson', 'informaticion', 'kouadou@gmail.com', '02020202', 'SSL OV', '082YuZyzuY2', 'CI787929223', 'DKBS', null, null, null, null, 'Djaha', 'bertin', '099090909', 'bertin.djaha@dkbsolutions.com', '7');
INSERT INTO `client` VALUES ('4', 'Angora', 'ginette', 'medecine', 'ginette@gmail.com', '0919010191', 'Personne physique', '028YuiZu282', 'CI2422627272', 'chu treichville', null, null, null, null, null, null, null, null, '7');

-- ----------------------------
-- Table structure for `employe`
-- ----------------------------
DROP TABLE IF EXISTS `employe`;
CREATE TABLE `employe` (
  `EMP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMP_NOM` longtext NOT NULL,
  `EMP_PRENOM` longtext NOT NULL,
  `EMP_JOB` longtext NOT NULL,
  `EMP_MAIL` longtext NOT NULL,
  `EMP_PHONE` longtext NOT NULL,
  `EMP_LOGIN` varchar(15) NOT NULL,
  `EMP_PASSWORD` varchar(40) NOT NULL,
  `EMP_DROIT` longtext NOT NULL,
  `EMP_LASTLOGIN` date DEFAULT NULL,
  PRIMARY KEY (`EMP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employe
-- ----------------------------
INSERT INTO `employe` VALUES ('4', 'Tuo', 'Nabitiala', 'Manager Technique', 'nabitiala.tuo@dkbsolutions.com', '07107754', 'tuo', 'tuo2014', 'normal', null);
INSERT INTO `employe` VALUES ('6', 'Angora', 'loïc', 'chef équipe développement', 'loicangora4@gmail.com', '081558158', 'lolo', 'lolo', 'administrateur', null);
INSERT INTO `employe` VALUES ('7', 'taugylar', 'brice', 'developpeur', 'taugylar@gmail.com', '09090909', 'taugy', 'taugy', 'operateur', null);
INSERT INTO `employe` VALUES ('9', 'Kouame', 'kouadio', 'informaticion', 'kouame@gmail.com', '09090909', 'kouam', 'kouam', 'auditeur', null);
INSERT INTO `employe` VALUES ('10', 'Nguessan', 'sylvia', 'informaticien', 'sylvia.koto@dkbsolutions.com', '08272829', 'sylvia', 'sysy', 'operateur', null);

-- ----------------------------
-- Table structure for `user_log`
-- ----------------------------
DROP TABLE IF EXISTS `user_log`;
CREATE TABLE `user_log` (
  `user_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `logout_date` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_log
-- ----------------------------
INSERT INTO `user_log` VALUES ('171', 'lolo', '2016-01-12 09:44:55', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('172', 'tuo', '2016-01-12 10:13:06', '2016-01-16 09:40:10', '4');
INSERT INTO `user_log` VALUES ('173', 'lolo', '2016-01-12 12:00:54', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('174', 'tuo', '2016-01-12 12:02:12', '2016-01-16 09:40:10', '4');
INSERT INTO `user_log` VALUES ('175', 'tuo', '2016-01-12 12:06:51', '2016-01-16 09:40:10', '4');
INSERT INTO `user_log` VALUES ('176', 'tuo', '2016-01-12 12:08:00', '2016-01-16 09:40:10', '4');
INSERT INTO `user_log` VALUES ('177', 'lolo', '2016-01-12 12:08:17', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('178', 'lolo', '2016-01-12 12:19:36', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('179', 'lolo', '2016-01-12 15:16:31', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('180', 'lolo', '2016-01-12 15:29:14', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('181', 'lolo', '2016-01-12 17:31:09', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('182', 'lolo', '2016-01-12 21:12:12', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('183', 'tuo', '2016-01-13 15:14:28', '2016-01-16 09:40:10', '4');
INSERT INTO `user_log` VALUES ('184', 'lolo', '2016-01-13 15:18:21', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('185', 'lolo', '2016-01-13 16:09:16', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('186', 'lolo', '2016-01-14 09:29:33', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('187', 'lolo', '2016-01-14 12:14:00', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('188', 'lolo', '2016-01-14 15:30:31', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('189', 'lolo', '2016-01-14 17:11:20', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('190', 'lolo', '2016-01-14 17:15:25', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('191', 'lolo', '2016-01-15 14:53:32', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('192', 'lolo', '2016-01-15 15:06:28', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('193', 'taugy', '2016-01-15 21:40:42', '2016-01-17 17:32:47', '7');
INSERT INTO `user_log` VALUES ('194', 'taugy', '2016-01-15 21:45:54', '2016-01-17 17:32:47', '7');
INSERT INTO `user_log` VALUES ('195', 'lolo', '2016-01-15 22:00:10', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('196', 'lolo', '2016-01-16 08:27:32', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('197', 'kouam', '2016-01-16 09:25:19', '2016-01-17 17:34:29', '9');
INSERT INTO `user_log` VALUES ('198', 'taugy', '2016-01-16 09:38:55', '2016-01-17 17:32:47', '7');
INSERT INTO `user_log` VALUES ('199', 'tuo', '2016-01-16 09:39:47', '2016-01-16 09:40:10', '4');
INSERT INTO `user_log` VALUES ('200', 'lolo', '2016-01-16 13:08:29', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('201', 'lolo', '2016-01-17 16:43:31', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('202', 'lolo', '2016-01-17 16:43:33', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('203', 'taugy', '2016-01-17 17:31:25', '2016-01-17 17:32:47', '7');
INSERT INTO `user_log` VALUES ('204', 'kouam', '2016-01-17 17:33:09', '2016-01-17 17:34:29', '9');
INSERT INTO `user_log` VALUES ('205', 'lolo', '2016-01-17 17:36:40', '2016-01-17 18:36:01', '6');
INSERT INTO `user_log` VALUES ('206', 'lolo', '2016-01-17 18:06:39', '2016-01-17 18:36:01', '6');
