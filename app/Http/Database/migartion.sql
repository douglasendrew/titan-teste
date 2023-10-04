SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `tbl_conta_pagar` (
  `id_conta_pagar` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data_pagar` date NOT NULL,
  `pago` tinyint(4) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `tbl_empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

ALTER TABLE `tbl_conta_pagar`
  ADD PRIMARY KEY (`id_conta_pagar`);

ALTER TABLE `tbl_empresa`
  ADD PRIMARY KEY (`id_empresa`);

ALTER TABLE `tbl_conta_pagar`
  MODIFY `id_conta_pagar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `tbl_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
