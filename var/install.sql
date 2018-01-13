-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

--
-- Create function "fn_distance_miles"
--
DROP FUNCTION IF EXISTS fn.distance_miles;
CREATE FUNCTION fn_distance_miles(`src_lat` float, `src_long` float, `dst_lat` float, `dst_long` float )
  RETURNS decimal(10,4)
BEGIN

return 3959.0 * 
	acos( cos( radians(`src_lat`) ) * cos( radians( `dst_lat` ) )
    * cos( radians( `src_long` ) - radians(`dst_long`) ) 
    + sin( radians(`src_lat`)) * sin( radians( `dst_lat` )));

END;

LOAD DATA INFILE '.\var\pharmacies.csv' INTO TABLE pharmacy;