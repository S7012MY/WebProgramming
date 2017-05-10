<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="display_style.css"/>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>

			<!-- Optional theme -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"/>
		</head>
		<body>
			<table class="table table-striped main-section" border="1">
				<tr class="header-row">
					<th>Type</th>
					<th>Name</th>
					<th>Author</th>
					<th>Year</th>
				</tr>
				<xsl:for-each select="entries/entry">
					
					<xsl:sort select="year"></xsl:sort>
					<xsl:if test="(year &gt; 2000) and (year &lt; 2010)">
					
						<tr class="data-row">
							<td class="type-data active">
								<xsl:value-of select="type"/>
							</td>
							<td class="name-data success">
								<xsl:value-of select="name"/>
							</td>
							<td class="author-data danger">
								<xsl:value-of select="author"/>
							</td>
							<td class="year-data">
								<xsl:value-of select="year"/>
							</td>
			    		</tr>
					</xsl:if>
				</xsl:for-each>
			</table>
			<input type="text" class="form-control" placeholder="Text input"/>
		</body>
	</html>
</xsl:template>
</xsl:stylesheet>