<?php
error_reporting(0);
require "db_connect.php";


$base64_image = $_POST["image"];
$base64_image = '/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEB
                                                                          AQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/2wBDAQEBAQEBAQEBAQEBAQEBAQEBAQEB
                                                                          AQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/wAARCABzAHMDASIA
                                                                          AhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQA
                                                                          AAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3
                                                                          ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWm
                                                                          p6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEA
                                                                          AwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSEx
                                                                          BhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElK
                                                                          U1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3
                                                                          uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD+/iii
                                                                          igAooooAoTTpYxdAyHGBg5zubn+XXJyRwADXzf8AEL9pT4WeBmm0/wD4TTw1Fqmm6hHpup2Gpf2i
                                                                          JLInfuEgRVUPnGCWkRgV+bA5+d/2ov2kL/wy03gjw2Ne0vV9V8Ipqmm6oqaT9isr8alrW0yvksWH
                                                                          9ldhtAKgDc1fnfMNR8R6n/aXiXUv7V1TVR/xNNQOQL7UMsOMDgY6Hvk4GMk/5nfSo+nzlXhBmWYc
                                                                          FcC4KlnXFWDVKnmeJxtKt/Z2TVZuU5YaM6GPwuIljvYOjiY4jD0MZhVhsRhZ0qkpTnb+g/DTwRqc
                                                                          TYelnfEdWvgssqQlLC0KEqMMTiZRk7U6sKtKq5UarS9pTjyy0jebTaPq7xV+3R8Ub1TpmleCPBOr
                                                                          aXqtgSWI8UhmLF88L4gRSCFzgKDjGSCCx8R1H4/fETxJnUtT8EeGuOn/ACFh1JA4HiP2y2MZ4PAO
                                                                          TzUGhn5jxjjvjufbHp9eRkirP9n2Hqf1/wDiq/yZ4p+nD9IPinEzrYrjzE0qTqRlSwdDA5fLD4an
                                                                          GTtTpOvg6+IfNe8pVa87tK0UtD+lcq8M/D7KqSpYPhzAv4ZVpueL9pWqJu05y+uNLqoxs7LmvJ35
                                                                          izZftM/FPw1nUf8AhB/DfGM86sMHLc5HiLj+I4ye4IJxXsHgj/god8Q/n0zxN4c+HOk6VpVgCNR/
                                                                          4qvbjLLgL/wkJwDgZ5JA25YYyfnvVtC04bh24IHb70me3Ujn2P8AETzXiniPSdOOefT16/Nx1/2c
                                                                          5+nQ5z9NwB9Nbx5yLF0Z4bjfE4nDR5fb4GthMup4fE07v3KksPg6VdWeqdOtFpybakkraY7wu8Ps
                                                                          9w8/rHD+F5941qc6yqU6t2ozTq1a2kdW4pxu2uaTUYn9Bfw2/aI+FnxKc6b4b8ceHdV1I3507TrP
                                                                          SjfL9qZdNXUgQJY3/wCWTM7MflVUIyWcmvo6v5QvDHj3xj8J9RsdR8FeJNS0v+ywdUdNLGQ2oNp7
                                                                          6M1/tbOQQVDKeNoAJ4LH92f2Tv2h1+NXhjTNA1C316XxZo3hDStT8TeIdTj0VbTWL976TS3aL+yJ
                                                                          CjO8kYc7tnyM24sysW/2e+jD9LbI/G+hUyPOqOFybjKh7RTwdL6xDCY6NGphoKWClicfmOIqObxM
                                                                          uRVqqlJU24ppya/lHxT8HMdwHCWbZZUqY/IOalB1KtajPEYXnU2qteNKhSUKFlZ1HzO9vdV3I+5K
                                                                          KKK/tM/EQooooAKKKKACvln9or42r8FfDWk6uG0LGra4NLCauNUKKRpWs6ryNKUyowXSSME9C+4m
                                                                          QAn6mr8Mf2u/iNqHib4j+Nvhqf7U/svwr4tXVBvA+xc+GTn+zR/eI1bLAcbsjJBzX8v/AEt/GHEe
                                                                          CnhDmPE2W1/YZ9mGLoZLw7V5OblzSqquMWtn/wAw2BrtQa99qGqcIt/pXhNwZT424wwuX4qnCrgM
                                                                          JF4vMoSnyXwcqkcHo+l6+Jw8W+nOt7tnzT4UsMbsHr9exHqfy4yMk5+bn1uyt+p79AfbLE9+3Xp1
                                                                          JwTzniNFhyXH93HPtzz19z78jvzXf2PU/Q/zcevfA/I8nqf+VvPcbiMbi61WrUbnJq7+cltpp7u2
                                                                          2r62a/0OxUI0qdWlC8YRScY/OSet1umu773auTSj90fYL+ruD2/2R/j1zRt/7R+b9evXJ29T3C8d
                                                                          8gcmtmuR1e+4Yt6cAfVgckdRwRxkYyOWPPkYWM66lSilpa8pJyWt1pHTX3U7X15mr3V35tClOvzU
                                                                          oX95wvJdEpS6W1v01Wq3bRneIvEenfMSf+YeCOgOfnUk4PXGOOwOc5Jrx3V5jqee31GO5z0PsvPJ
                                                                          5bgd/QB4V1Dn+0z/AGsOMcn+84B65+nXOT1KnNaXStOGc46/zLevr369umQK+2yupgsAoU8M3VqX
                                                                          SjVhf2fut/Dr997a21k9vocLOjhrcr5tu0b2as935X3umldLV+I6xYY45I449cs+O/B478/dCk4O
                                                                          cb4Y/FTUfgj451TU9M03TdXHigLpP/E1/tfqNVbVQy/2Oc9T6EgkdNpLdj4n7+2z+c//AMSP85z8
                                                                          w+Np/vcn/kIKPyMvP/1vcjkZz+/eEXE+acL8R5Vn2WYuphMZgK1OvRrU1RfK3zU6kWqtKrf2tCVW
                                                                          k7JNKbk+ZxSDMsvwedZPjcDmFCFbD4umoThNc32pap3TTa101ulduzv/AGN+G/F3hzxhpTan4c1O
                                                                          LU9OW7ksPt0QO03URAcDKg8bxklVyTwpAbPZ1+VP/BLr4v6h8SPhD46l8TajqWr6unxe1fTBqOpf
                                                                          2cHaxT4Z/DrU0BEL7mA82TKbWGHYnIBNfqtX/Tl4dcXYbjvgzJOK8HF08Pm+F+s0abg6bhT9tXpx
                                                                          91tv31TU03rvHXl5n/ltxNkFfhjP80yPEShOeAq06XtItS51KjCrfmT1S9oopbaSd/esiiiivtTw
                                                                          Qooprfdb/P8AEf8A9f5e9AHyN+0v8aPDvw28DeKLBNT01vE58PpqejaDqiX2NRia/On7w0RHyFm2
                                                                          xgcEYYAr87fhnrnjM+JPEniXxJqY00NqhyDpI/4l4OWx1Y5PIJ78nk/Oa9i/ae+LN/8AEjxLp2pA
                                                                          6gg/4RBNJxquB01XWtU4wDwB8p6kDAABINfhJ+2f/wAFBvDv7K+m6d/anhj4kasP+ExPhT/ikv8A
                                                                          hEP4fDWt6rz/AGv4gA9sjqWBPA3H/BX6RfiDxb9LTxRXAHh1Qnm2QZZXoU+HcDhKns4ZnXg8diI5
                                                                          nXeLxVRzxDpZpXwMadD2eHpYanQ9nSgo1JVP7z8LeHcm8LuD8RnfEVf6lmGJozrZnVrRrVHh5xxF
                                                                          KjPDUVRpTvRtgVKKlyunKtNRlUSk1+3GjX3X6AcfU89f88HPSu/g7/U/pnH8z+fU1+cH7GH7Tmm/
                                                                          tJ+GNW8TeGdN8R6XpelfEDVfCYsPFP8AZIvhqP8AwjOk6sWxpGvdMaqp5wRuOQCHz+htlP8Ae/D+
                                                                          bd89DnP55wCa/wAy/EPgzN+BuIsy4dzzDSwebZbW+r47CTS56GIjGE50pWnJaKcbWbVmtnzn7LGv
                                                                          hcbhKWYYDEwxODrU41MNiaSfs69ObS5ovmvGKava7vd6pK50P2lf8qf/AIqoJZzzkDtwCfVsZ4/E
                                                                          DPHzck5qn9oP94f98mse7uDg5HPTr/vdTzxjPbqRjPGfhqeGlOSSd1pd2emsul';
$image = base64_decode($base64_image);
 
$response = array();

$sql ="INSERT INTO `tbl_image` (`image`) VALUES ('base64_decode($base64_image)' ); ";

if(mysqli_query($con,$sql))
	{
		echo "success";

	}
else
	{
		echo "failed";
	}
	
?>