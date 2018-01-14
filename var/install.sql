-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

--
-- Drop procedure "fn_distance_miles"
--
DROP FUNCTION IF EXISTS fn_distance_miles;
--
-- Create function "fn_distance_miles"
--

CREATE FUNCTION fn_distance_miles(`src_lat` float, `src_long` float, `dst_lat` float, `dst_long` float )
  RETURNS decimal(10,4)
BEGIN

return 3959.0 * 
	acos( cos( radians(`src_lat`) ) * cos( radians( `dst_lat` ) )
    * cos( radians( `src_long` ) - radians(`dst_long`) ) 
    + sin( radians(`src_lat`)) * sin( radians( `dst_lat` )));

END;

--
-- Drop procedure "sp_nearby_pharmacy"
--
DROP PROCEDURE IF EXISTS sp_nearby_pharmacy;

--
-- Create procedure "sp_nearby_pharmacy"
--
CREATE PROCEDURE sp_nearby_pharmacy(IN p_latitude FLOAT, IN p_longitude FLOAT)
BEGIN
SELECT
  name,
  address,
  city,
  state,
  zip,
  latitude,
  longitude,
  fn_distance_miles(latitude, longitude, p_latitude, p_longitude) AS distance
FROM pharmacy
ORDER BY fn_distance_miles(latitude, longitude, p_latitude, p_longitude) ASC
LIMIT 0, 1;
END;
