
CREATE UNIQUE INDEX tmp ON f_cd_genre(cd,genre);

delimiter //

CREATE PROCEDURE update_genre()
BEGIN
	SET @NumCD = (SELECT min(cd) FROM f_cd);
	SET @MaxCD = (SELECT max(cd) FROM f_cd);
	SET @CurrentCDGenre = 0;


	WHILE @NumCD <= @MaxCD
    DO

		SET @CurrentCDGenre = (SELECT genre FROM f_cd WHERE cd = @NumCD);

		CASE @CurrentCDGenre
			WHEN 5 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,155);
			WHEN 6 THEN
				UPDATE f_cd SET genre = 154 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,155);
			WHEN 7 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,1);
			WHEN 8 THEN
				UPDATE f_cd SET genre = 157 WHERE cd = @NumCD;
			WHEN 9 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,2);
			WHEN 10 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,3);
			WHEN 11 THEN
				UPDATE f_cd SET genre = 3 WHERE cd = @NumCD;
			WHEN 12 THEN
				UPDATE f_cd SET genre = 152 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,164);
			WHEN 13 THEN
				UPDATE f_cd SET genre = 154 WHERE cd = @NumCD;
			WHEN 14 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = @NumCD;
			WHEN 15 THEN
				UPDATE f_cd SET genre = 156 WHERE cd = @NumCD;
			WHEN 16 THEN
				UPDATE f_cd SET genre = 155 WHERE cd = @NumCD;
			WHEN 17 THEN
				UPDATE f_cd SET genre = 155 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,1);
			WHEN 18 THEN
				UPDATE f_cd SET genre = 23 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,158);
			WHEN 20 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,1);
			WHEN 21 THEN
				UPDATE f_cd SET genre = 3 WHERE cd = @NumCD;
			WHEN 22 THEN
				UPDATE f_cd SET genre = 155 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,2);
			WHEN 24 THEN
				UPDATE f_cd SET genre = 3 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,4);
			WHEN 25 THEN
				UPDATE f_cd SET genre = 156 WHERE cd = @NumCD;
			WHEN 26 THEN
				UPDATE f_cd SET genre = 152 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,164);
			WHEN 27 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,123);
			WHEN 28 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,23);
			WHEN 29 THEN
				UPDATE f_cd SET genre = 154 WHERE cd = @NumCD;
			WHEN 30 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,155);
			WHEN 31 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,158);
			WHEN 32 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,161);
			WHEN 33 THEN
				UPDATE f_cd SET genre = 155 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,157);
			WHEN 34 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,164);
			WHEN 35 THEN
				UPDATE f_cd SET genre = 156 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,23);
			WHEN 36 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,155);
			WHEN 37 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,157);
			WHEN 38 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,164);
			WHEN 39 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,158);
			WHEN 40 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,1);
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,4);
			WHEN 41 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,157);
			WHEN 42 THEN
				UPDATE f_cd SET genre = 154 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,1);
			WHEN 43 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,4);
			WHEN 44 THEN
				UPDATE f_cd SET genre = 156 WHERE cd = @NumCD;
			WHEN 45 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,163);
			WHEN 46 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,155);
			WHEN 47 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,1);
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,163);
			WHEN 48 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,84);
			WHEN 49 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,131);
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,63);
			WHEN 52 THEN
				UPDATE f_cd SET genre = 157 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,82);
			WHEN 53 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,163);
			WHEN 54 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = @NumCD;
			WHEN 55 THEN
				UPDATE f_cd SET genre = 3 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,1);
			WHEN 57 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = @NumCD;
			WHEN 58 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,58);
			WHEN 59 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,161);
			WHEN 60 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,1);
			WHEN 61 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,131);
			WHEN 62 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,163);
			WHEN 63 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,63);
			WHEN 64 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,131);
			WHEN 65 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,131);
			WHEN 66 THEN
				UPDATE f_cd SET genre = 157 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,82);
			WHEN 67 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,163);
			WHEN 68 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,123);
			WHEN 69 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,163);
			WHEN 70 THEN
				UPDATE f_cd SET genre = 3 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,63);
			WHEN 71 THEN
				UPDATE f_cd SET genre = 154 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,1);
			WHEN 72 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,84);
			WHEN 73 THEN
				UPDATE f_cd SET genre = 155 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,131);
			WHEN 74 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,158);
			WHEN 75 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,155);
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,4);
			WHEN 77 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,131);
			WHEN 78 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,123);
			WHEN 79 THEN
				UPDATE f_cd SET genre = 157 WHERE cd = @NumCD;
			WHEN 80 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = @NumCD;
			WHEN 81 THEN
				UPDATE f_cd SET genre = 23 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,164);
			WHEN 82 THEN
				UPDATE f_cd SET genre = 157 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,82);
			WHEN 83 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,58);
			WHEN 84 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,84);
			WHEN 85 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,63);
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,58);
			WHEN 86 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,63);
			WHEN 87 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
			WHEN 88 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,1);
			WHEN 89 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,131);
			WHEN 90 THEN
				UPDATE f_cd SET genre = 23 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,1);
			WHEN 91 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,161);
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,58);
			WHEN 92 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = @NumCD;
			WHEN 93 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,84);
			WHEN 94 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
			WHEN 95 THEN
				UPDATE f_cd SET genre = 157 WHERE cd = @NumCD;
			WHEN 96 THEN
				UPDATE f_cd SET genre = 155 WHERE cd = @NumCD;
			WHEN 97 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,163);
			WHEN 98 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
			WHEN 99 THEN
				UPDATE f_cd SET genre = 157 WHERE cd = @NumCD;
			WHEN 100 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,163);
			WHEN 101 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,163);
			WHEN 102 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,159);
			WHEN 103 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,131);
			WHEN 104 THEN
				UPDATE f_cd SET genre = 155 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,154);
			WHEN 105 THEN
				UPDATE f_cd SET genre = 152 WHERE cd = @NumCD;
			WHEN 107 THEN
				UPDATE f_cd SET genre = 155 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,58);
			WHEN 108 THEN
				UPDATE f_cd SET genre = 156 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,1);
			WHEN 109 THEN
				UPDATE f_cd SET genre = 3 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,1);
			WHEN 110 THEN
				UPDATE f_cd SET genre = 3 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,123);
			WHEN 111 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,111);
			WHEN 112 THEN
				UPDATE f_cd SET genre = 154 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,23);
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,2);
			WHEN 113 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,156);
			WHEN 114 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,156);
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,157);
			WHEN 115 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,23);
			WHEN 116 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,158);
			WHEN 117 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = @NumCD;
			WHEN 118 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,58);
			WHEN 119 THEN
				UPDATE f_cd SET genre = 152 WHERE cd = @NumCD;
			WHEN 120 THEN
				UPDATE f_cd SET genre = 23 WHERE cd = @NumCD;
			WHEN 121 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,84);
			WHEN 122 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,163);
			WHEN 123 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,123);
			WHEN 124 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
			WHEN 125 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,1);
			WHEN 126 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,1);
			WHEN 127 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,163);
			WHEN 128 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,84);
			WHEN 129 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,84);
			WHEN 130 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,84);
			WHEN 131 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,131);
			WHEN 132 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = @NumCD;
			WHEN 133 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,163);
			WHEN 134 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,163);
			WHEN 135 THEN
				UPDATE f_cd SET genre = 3 WHERE cd = @NumCD;
			WHEN 136 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = @NumCD;
			WHEN 137 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = @NumCD;
			WHEN 139 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = @NumCD;
			WHEN 140 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = @NumCD;
			WHEN 141 THEN
				UPDATE f_cd SET genre = 152 WHERE cd = @NumCD;
			WHEN 142 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,159);
			WHEN 144 THEN
				UPDATE f_cd SET genre = 157 WHERE cd = @NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,82);
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(@NumCD,164);
			WHEN 146 THEN
				UPDATE f_cd SET genre = 155 WHERE cd = @NumCD;
			WHEN 148 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = @NumCD;
			WHEN 151 THEN
				UPDATE f_cd SET genre = 156 WHERE cd = @NumCD;

			 ELSE
			        BEGIN
			        END;
		END CASE;

		SET @NumCD = @NumCD + 1;
	END WHILE;
 END//

delimiter ;


DROP INDEX tmp ON f_cd_genre;

CALL update_genre();
drop procedure update_genre;
