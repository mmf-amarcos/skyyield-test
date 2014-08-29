CREATE TABLE IF NOT EXISTS `menu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) CHARACTER SET latin1 NOT NULL,
  `link` varchar(255) CHARACTER SET latin1 NOT NULL,
  `parent_id` int(11) NOT NULL,
  `position_in_level` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

DROP PROCEDURE  IF EXISTS insert_menu_item;
DROP PROCEDURE  IF EXISTS update_menu_item;
DROP PROCEDURE  IF EXISTS move_menu_item;

DELIMITER //

CREATE PROCEDURE insert_menu_item (IN p_label VARCHAR(50), IN p_link VARCHAR(50), IN p_parent_id INT, IN p_position_in_level INT )
  BEGIN
    INSERT INTO menu_item (id, label, link, parent_id, position_in_level) VALUES (null, p_label, p_link, p_parent_id, p_position_in_level);
  END
//

CREATE PROCEDURE update_menu_item (IN p_id INT, IN p_label VARCHAR(50), IN p_link VARCHAR(50))
BEGIN
  update menu_item set 
    label=p_label
    , link=p_link
   where id=p_id;
END
//

CREATE PROCEDURE move_menu_item (IN p_id INT, IN p_parent_id INT, IN p_position_in_level INT)
BEGIN
  update menu_item set position_in_level=position_in_level+1 where parent_id=p_parent_id and position_in_level >= p_position_in_level;
  update menu_item set parent_id = p_parent_id, position_in_level=p_position_in_level where id = p_id;
END
//

DELIMITER ;

