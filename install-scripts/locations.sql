REPLACE INTO /*TABLE_PREFIX*/t_country (pk_c_code, s_name, s_slug) VALUES 
('FI', 'Finland', 'finland');

REPLACE INTO /*TABLE_PREFIX*/t_region (pk_i_id, fk_c_country_code, s_name, b_active, s_slug) VALUES 
(0006661, 'fi', 'Rovaniemen keskus', 1, 'rovaniemen-keskus');

REPLACE INTO /*TABLE_PREFIX*/t_city (pk_i_id, fk_i_region_id, fk_c_country_code, s_name, b_active, s_slug) VALUES 
(66611, 0006661, 'fi', 'Keskusta', 1, 'keskusta'),
(66612, 0006661, 'fi', 'Ounasvaara', 1, 'ounasvaara');

REPLACE INTO /*TABLE_PREFIX*/t_region (pk_i_id, fk_c_country_code, s_name, b_active, s_slug) VALUES 
(0006662, 'fi', 'Alaounasjoki', 1, 'alaounasjoki');

REPLACE INTO /*TABLE_PREFIX*/t_city (pk_i_id, fk_i_region_id, fk_c_country_code, s_name, b_active, s_slug) VALUES 
(66613, 0006662, 'fi', 'Sinettä', 1, 'sinetta');

REPLACE INTO /*TABLE_PREFIX*/t_region (pk_i_id, fk_c_country_code, s_name, b_active, s_slug) VALUES 
(0006663, 'fi', 'Yläounasjoki', 1, 'ylaounasjoki');

REPLACE INTO /*TABLE_PREFIX*/t_region (pk_i_id, fk_c_country_code, s_name, b_active, s_slug) VALUES 
(0006664, 'fi', 'Alakemijoki', 1, 'alakemijoki');

REPLACE INTO /*TABLE_PREFIX*/t_region (pk_i_id, fk_c_country_code, s_name, b_active, s_slug) VALUES 
(0006665, 'fi', 'Yläkemijoki', 1, 'ylakemijoki');

REPLACE INTO /*TABLE_PREFIX*/t_region (pk_i_id, fk_c_country_code, s_name, b_active, s_slug) VALUES 
(0006666, 'fi', 'Sodankyläntien suunta', 1, 'sodankylantien-suunta');

REPLACE INTO /*TABLE_PREFIX*/t_region (pk_i_id, fk_c_country_code, s_name, b_active, s_slug) VALUES 
(0006667, 'fi', 'Ranuantien suunta', 1, 'ranuantien-suunta');